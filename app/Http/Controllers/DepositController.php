<?php

namespace App\Http\Controllers;

use App\Account;
use App\Deposit;
use App\Mail\DepositConfirmed;
use App\Mail\DepositMade;
use App\Mail\DepositMarkedAsNotPaid;
use App\Mail\DepositMarkedAsPaid;
use App\PaymentMethod;
use App\Plan;
use App\Referral;
use App\User;
use Carbon\Carbon;
use DateTime;
use Error;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class DepositController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (isAdmin()) {
            $deposits = Deposit::orderBy('id', 'desc')->get();
        } else {
            $userid = auth()->user()->id;
            $deposits = Deposit::where('user_id', $userid)->orderBy('id', 'desc')->get();
        }

        return view('dashboard.deposits.index', ['deposits' => $deposits]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Plan $plan, PaymentMethod $paymentMethod)
    {
        $plans = $plan->all();
        $methods = $paymentMethod->all();
        return view('dashboard.deposits.create', compact('plans', 'methods'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Deposit::validateForm();
        $plan_id = request()->plan_id;
        $plan = Plan::find($plan_id);

        if (request()->amount < $plan->min) {
            return redirect()->back()->withErrors(['error' => 'Amount cannot be less than the minimum threshold for the chosen plan']);
        } elseif (request()->amount > $plan->max) {
            return redirect()->back()->withErrors(['error' => 'Amount cannot be greater than the maximum threshold for the chosen plan']);
        }

        $roi = ($request->amount / $plan->percentage) + $request->amount;

        $values = [
            'user_id' => auth()->user()->id,
            'plan_id' => $request->plan_id,
            'payment_method_id' => $request->payment_method_id,
            'amount' => $request->amount,
            'roi' => $roi,
            'daily_profit' => 0,
            'created_at' => date('Y-m-d'),
            'is_paid' => 0,
            'status' => 0
        ];

        if ($request->deposit_type === 'fresh') {
            $stored = Deposit::create($values);
        } elseif ($request->deposit_type === 'account') {
            $account = Account::whereUser_id(auth()->user()->id)->limit(1)->first();

            if ($account !== null) {
                if ($account->balance >= $request->amount) {
                    $stored = Deposit::create($values);
                    $new_balance = $account->balance - $request->amount;
                    $account->update(['balance' => $new_balance]);
                }
                return redirect()->back()->withErrors(['error' => 'You have insufficient balance']);
            }
            return redirect()->back()->withErrors(['error' => 'You have insufficient balance']);
        }


        if ($stored) {
            $this->sendDepositMadeMail($request->amount, $plan->name);
            $fullname = auth()->user()->fullname;
            $this->notifyAdmin("New Deposit Request", "$fullname made a deposit request of $$request->amount under the $plan->name plan");
            return redirect(route('deposit.index'))->with('message', 'Deposit was successful');
        }
        return redirect()->back()->withErrors(['error' => 'Deposit failed']);
    }

    public function addBonusToReferrer($userid, $id)
    {
        $deposits = Deposit::whereUser_id($userid)->get();

        if ($deposits->count() < 2) {
            $referrer = Referral::whereReferred($userid);
            if ($referrer !== null) {
                $bonus = (Deposit::find($id)->amount / 100) * 10;
                $referrer->update(['bonus' => $bonus]);
            }
        }
    }

    public function sendDepositMadeMail($amount, $plan)
    {
        $to = auth()->user()->email;
        $subject = "Deposit was made";
        $message = "You made a deposit of $$amount under the $plan plan, please make payment to start earning";
        Mail::to($to)->send(new DepositMade($subject, $message));
    }

    public function sendDepositMarkedAsPaidMail($amount, $plan)
    {
        $to = auth()->user()->email;
        $subject = "Deposit Marked as Paid";
        $message = "You have marked your deposit of $$amount under the $plan plan as paid. The Team will attend to you shortly";
        Mail::to($to)->send(new DepositMarkedAsPaid($subject, $message));
    }

    public function sendDepositMarkedAsNotPaidMail($email, $fullname, $amount, $plan)
    {
        $to = $email;
        $subject = "Deposit Marked as not Paid";
        $message = "Your deposit of $$amount under the $plan plan has been marked as not paid because the funds were not received, please make payment before marking as paid";
        Mail::to($to)->send(new DepositMarkedAsNotPaid($fullname, $subject, $message));
    }

    public function sendDepositConfirmedMail($email, $amount, $plan, $fullname)
    {
        $to = $email;
        $subject = "Deposit Confirmed";
        $message = "Your Deposit of $$amount under the $plan plan has been confirmed and approved. Your Deposit is now active.";
        Mail::to($to)->send(new DepositConfirmed($subject, $message, $fullname));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function show(Deposit $deposit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $deposit = Deposit::find($id);
        return view('dashboard.deposits.edit', compact('deposit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $datetime = new DateTime($request->maturity_date);
        $maturity_period = $datetime->format('z');
        $request->request->add(['maturity_period' => $maturity_period]);
        $updated = Deposit::find($id)->update($request->all());

        if ($updated) {
            return redirect(route('deposit.index'))->with('message', 'Deposit updated');
        }
        return redirect()->back()->withErrors(['error' => 'Deposit was not updated']);
    }

    public function confirmPayment($id)
    {
        $deposit = Deposit::find($id);
        $plan = Plan::find($deposit->plan_id);
        $plan_duration = $plan->duration;
        $maturity_period = (date('z') + 1) + $plan_duration;
        $maturity_date = date('Y-m-d', (time() + ((60 * 60 * 24) * $plan_duration)));
        $deposit->is_paid = 1;
        $deposit->status = 1;
        if ($deposit->paid_at === null) {
            $deposit->paid_at = date('Y-m-d');
        }
        $deposit->paid_at;
        $deposit->maturity_period = $maturity_period;
        $deposit->maturity_date = $maturity_date;
        $updated = $deposit->save();
        $user = User::find($deposit->user_id);
        $fullname = $user->fullname;
        $email = $user->email;

        if ($updated) {
            $this->addBonusToReferrer($user->id, $id);
            $this->sendDepositConfirmedMail($email, $deposit->amount, $plan->name, $fullname);
            $this->notifyAdmin("Deposit Confirmed", "You confirmed the deposit of $$deposit->amount made by $fullname under the $plan->name plan");
            return redirect(route('deposit.index'))->with('message', 'Payment has been Confirmed');
        }
        return redirect()->back()->withErrors(['error' => 'Payment not confirmed']);
    }

    public function hasPaid($id)
    {
        $deposit = Deposit::find($id);
        $hasPaid = $deposit->update(['is_paid' => 1, 'paid_at' => date('Y-m-d')]);

        if ($hasPaid) {
            $amount = $deposit->amount;
            $plan = Plan::find($deposit->plan_id)->name;
            $this->sendDepositMarkedAsPaidMail($amount, $plan);
            $fullname = auth()->user()->fullname;
            $this->notifyAdmin("New Payment", "$fullname has marked his deposit of $$amount under $plan plan as paid");
            return redirect(route('deposit.index'))->with('message', 'Deposit has been marked as paid');
        }
        return redirect(route('deposit.index'))->withErrors(['error' => 'Deposit was not marked as paid']);
    }

    public function hasNotPaid($id)
    {
        $deposit = Deposit::find($id);
        $notPaid = $deposit->update(['is_paid' => 0, 'maturity_period' => null, 'maturity_date' => null, 'paid_at' => null]);
        $user = User::find($deposit->user_id);
        $email = $user->email;
        $fullname = $user->fullname;
        $plan = Plan::find($deposit->plan_id)->name;

        if ($notPaid) {
            $this->sendDepositMarkedAsNotPaidMail($email, $fullname, $deposit->amount, $plan);
            return redirect(route('deposit.index'))->with('message', 'Deposit has been marked as not paid');
        }
        return redirect()->back()->withErrors(['error' => 'Deposit could not be marked as not paid']);
    }

    public function dailyProfit()
    {
        echo "executing command . . . \n";

        $deposits = Deposit::where(['status' => 1])->orderBy('id', 'desc')->get();

        foreach ($deposits as $deposit) {
            $today = (date('z') + 1);

            if ($today <= $deposit->maturity_period) {
                $plan = Plan::find($deposit->plan_id);
                $amount = $deposit->amount;
                $roi = $deposit->roi;

                $profit = $roi - $amount;
                $daily_income = $profit / $plan->duration;

                $daily_profit = $deposit->daily_profit + $daily_income;
                Deposit::find($deposit->id)->update(['daily_profit' => $daily_profit]);
            } elseif ($today > $deposit->maturity_period) {
                Deposit::find($deposit->id)->update(['status' => 2]);

                $accounts = Account::where('user_id', $deposit->user_id)->get();

                foreach ($accounts as $account) {
                    if ($account === null) {
                        Account::create(['user_id' => $deposit->user_id, 'balance' => $deposit->roi]);
                    } elseif ($account !== null) {
                        $oldbalance = $account->balance;
                        $newbalance = $oldbalance + $deposit->roi;
                        $account->update(['balance' => $newbalance]);
                    }
                }
            }
        }
        echo "command executed";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Deposit  $deposit
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Deposit::find($id)->delete();

        if ($deleted) {
            return redirect(route('deposit.index'))->with('message', 'Deposit deleted');
        }
        return redirect()->back()->withErrors(['error' => 'Deposit not deleted']);
    }

    public function paymentPage($id)
    {
        $deposit = Deposit::find($id);
        $amount = $deposit->amount;
        $paymentMethod = PaymentMethod::find($deposit->payment_method_id);
        $symbol = $paymentMethod->symbol;
        $address = $paymentMethod->address;
        return view('dashboard.deposits.payment-page', compact('amount', 'symbol', 'address'));
    }
}
