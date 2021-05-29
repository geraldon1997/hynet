<?php

namespace App\Http\Controllers;

use App\Account;
use App\Mail\WithdrawalRequest;
use App\User;
use App\Withdrawal;
use App\WithdrawalMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AccountController extends Controller
{
    public function index()
    {
        $userid = auth()->user()->id;
        if (isAdmin()) {
            $accounts = Account::all();
        } else {
            $accounts = Account::where('user_id', $userid)->limit(1)->first();
        }

        return view('dashboard.accounts.index', compact('accounts'));
    }

    public function create($user_id)
    {
        return view('dashboard.accounts.create', compact('user_id'));
    }

    public function store()
    {
        $user_id = request()->user_id;
        $amount = request()->amount;
        $fullname = User::find($user_id)->fullname;
        $account = Account::where('user_id', $user_id)->limit(1)->first();

        if ($account !== null) {
            $balance = $account->balance;
            $new_balance = $balance + $amount;

            $funded = $account->update(['balance' => $new_balance]);

            if ($funded) {
                return redirect(route('user.index'))->with('message', "$fullname has been funded with $$amount");
            }
            return redirect()->back()->withErrors(['error' => "$fullname could not be funded"]);
        }

        $funded = Account::create(['user_id' => $user_id, 'balance' => $amount]);

        if ($funded) {
            return redirect(route('user.index'))->with('message', "$fullname has been funded with $$amount");
        }
        return redirect()->back()->withErrors(['error' => "$fullname could not be funded"]);
    }

    public function show($user_id)
    {
        $account = User::where('user_id', $user_id)->limit(1)->first();
        return view('dashboard.accounts.show', compact('account'));
    }

    public function edit($id)
    {
        //
    }

    public function update($id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function debit(WithdrawalController $wc)
    {
        Account::validateWithdrawalForm();
        $userid = auth()->user()->id;
        $amount = request()->amount;
        $method = request()->method;
        $address = request()->address;
        $account = Account::where('user_id', $userid)->limit(1)->first();
        $balance = $account->balance;

        if ($amount < 100) {
            return redirect()->back()->withErrors(['error' => 'You cannot Withdraw less than $100']);
        }

        if ($amount > $balance) {
            return redirect()->back()->withErrors(['error' => 'You cannot Withdraw more than you have']);
        }

        $new_balance = $balance - $amount;
        $account->update(['balance' => $new_balance]);

        $withdraw = [
            'user_id' => $userid,
            'amount' => $amount,
            'withdrawal_method_id' => $method,
            'address' => $address,
            'status' => 0,
            'requested_on' => date('Y-m-d')
        ];

        $withdrawal = Withdrawal::create($withdraw);
        $withdrawal_method = WithdrawalMethod::find($method)->name;
        $this->notifyUser($withdrawal->amount, $withdrawal_method, $withdrawal->address);
        $this->notifyAdmin("Withdrawal Request", User::find($userid)->fullname." made a request to withdraw $$withdrawal->amount worth of $withdrawal_method to address: $withdrawal->address");
        return redirect(route('account.index'))->with('message', 'Withdrawal request has been sent');
    }

    public function notifyUser($amount, $method, $address)
    {
        $to = auth()->user()->email;
        $fullname = auth()->user()->fullname;
        $message = "You requested a withdrawal of $$amount worth of $method to $address, the request will be processed shortly";
        Mail::to($to)->send(new WithdrawalRequest($fullname, $message));
    }
}
