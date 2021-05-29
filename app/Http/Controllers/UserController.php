<?php

namespace App\Http\Controllers;

use App\Deposit;
use App\Mail\ContactUser;
use App\Mail\NotifyReferrer;
use App\Mail\PasswordReset;
use App\Mail\WelcomeUser;
use App\Referral;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = User::class;
        return view('dashboard.users.index', compact('users', 'user'));
    }

    public function create()
    {
        $page = 'Register';
        return view('auths.register', compact('page'));
    }

    public function store(Request $request)
    {
        $values = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'joined_at' => date('Y-m_d')
        ];

        try {
            $registered = User::create($values);
        } catch (\Illuminate\Database\QueryException $e) {
            $errorCode = $e->errorInfo[1];
            // dd($e);
            if ($errorCode == '1062') {
                if (strpos($e->errorInfo[2], "'users_email_unique'")) {
                    $message = str_replace('Duplicate entry', 'Email', $e->errorInfo[2]);
                    $message = str_replace("for key 'users_email_unique'", 'is already registered, please choose another', $message);
                } elseif (strpos($e->errorInfo[2], "'users_username_unique'")) {
                    $message = str_replace('Duplicate entry', 'Username', $e->errorInfo[2]);
                    $message = str_replace("for key 'users_username_unique'", 'is already registered, please choose another', $message);
                }
                return back()->withErrors(['error' => $message]);
            }
        }

        if ($registered) {
            if (session('referrer') !== null) {
                $referrer = User::where('username', session('referrer'))->first()->id;
                Referral::create(['referrer' => $referrer, 'referred' => $registered->id, 'is_withdrawn' => 0]);
                $this->notifyReferrer($referrer, $request->fullname);
            }
            $this->sendWelcomeMessage();
            $this->notifyAdmin("New User Registered", "$request->username just joined your site");
            $message = "Thank you for registering with us, Pleas Check your Email for your Login Details";
            return redirect(route('user.register-success'))->with('message', $message);
        }
        return redirect()->back()->withErrors(['error' => 'an error occurred, please try again later']);
    }

    public function registerSuccess()
    {
        $page = "Registeration Success";
        return view('auths.register-success', compact('page'));
    }

    public function notifyReferrer($id, $fullname)
    {
        $user = User::find($id);
        $myname = $user->fullname;
        $to = $user->email;
        Mail::to($to)->send(new NotifyReferrer($myname, $fullname));
    }

    public function dashboard(DepositController $deposit)
    {
        $current_deposit = Deposit::where(['user_id' => auth()->user()->id, 'status' => 1])->orderBy('id', 'desc')->first();
        $total_sum_of_daily_profit = Deposit::where(['user_id' => auth()->user()->id, 'status' => 1])->get()->sum('daily_profit');
        return view('dashboard.index', compact('current_deposit', 'total_sum_of_daily_profit'));
    }

    public function edit($id)
    {
        $user = User::find($id);
        return view('dashboard.users.edit', compact('user'));
    }

    public function update($id)
    {
        $updated = User::find($id)->update(request()->all());

        if ($updated) {
            return redirect(route('user.index'))->with('message', 'User Updated successfully');
        }
        return redirect()->back()->withErrors(['error' => 'User was not updated']);
    }

    public function fundAccount($id)
    {
        $user_id = $id;
        return view('dashboard.accounts.create', compact('user_id'));
    }

    public function composeMail($id)
    {
        $email = User::find($id)->email;
        return view('dashboard.users.compose-email', compact('email'));
    }

    public function sendWelcomeMessage()
    {
        $to = request()->email;
        $subject = $this->welcomeSubject();
        $message = $this->welcomeMessage();
        return Mail::to($to)->send(new WelcomeUser($subject, $message));
        // return (new WelcomeUser($subject, $message))->render();
    }

    public function welcomeMessage()
    {
        $message = "You are welcome to ".config('app.name')." below are your details.";
        return $message;
    }

    public function welcomeSubject()
    {
        $subject = "Welcome";
        return $subject;
    }

    public function sendMail()
    {
        $to = request()->email;
        $fullname = User::where('email', $to)->limit(1)->first()->fullname;
        Mail::to($to)->send(new ContactUser($fullname));

        if (Mail::failures()) {
            return redirect()->back()->withErrors(['error' => 'Email could not be sent']);
        }
        return redirect(route('user.index'))->with('message', "Email Sent to $fullname successfully");
    }

    public function destroy($id)
    {
        $deleted = User::find($id)->delete();

        if ($deleted) {
            return redirect(route('user.index'))->with('message', 'User was deleted successfully');
        }
        return redirect()->back()->withErrors(['error' => 'User could not be deleted']);
    }

    public function forgotPassword()
    {
        $page = "Forgot Password";
        return view('auths.forgot-password', compact('page'));
    }

    public function sendPasswordResetLink(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
        ]);

        $token = Str::random(64);

        $reset = DB::table('password_resets')->where('email', $request->email)->limit(1)->first();

        if ($reset === null) {
            DB::table('password_resets')->insert([
                'email' => $request->email,
                'token' => $token,
                'created_at' => Carbon::now()
              ]);
        } else {
            DB::table('password_resets')
                ->where('email', $request->email)
                ->limit(1)
                ->first()
                ->update(['token' => $token]);
        }



        Mail::to($request->email)->send(new PasswordReset($token));

        return back()->with('message', 'We have e-mailed your password reset link!');
    }

    public function resetPassword($token)
    {
        $page = "Password Reset";
        return view('auths.reset-password', compact('page', 'token'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where([
                              'email' => $request->email,
                              'token' => $request->token
                            ])
                            ->limit(1)->first();

        if (!$updatePassword) {
            return back()->withInput()->with('error', 'Invalid token!');
        }

        $user = User::where('email', $request->email)
                    ->update(['password' => bcrypt($request->password)]);

        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect(route('user.login'))->with('message', 'Your password has been changed!');
    }
}
