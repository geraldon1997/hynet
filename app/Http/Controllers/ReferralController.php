<?php

namespace App\Http\Controllers;

use App\Account;
use App\Referral;
use App\User;
use Illuminate\Http\Request;

class ReferralController extends Controller
{
    public function index()
    {
        $userid = auth()->user()->id;
        $refs = Referral::whereReferrer($userid)->get();
        return view('dashboard.referrals', compact('refs'));
    }

    public function withdrawBonusToBalance($id)
    {
        $userid = auth()->user()->id;
        $referral= Referral::find($id);
        $account = Account::whereUser_id($userid)->limit(1);

        if ($account === null) {
            $withdrawn = Account::create(['user_id' => $userid, 'balance' => $referral->bonus]);
        } else {
            $old_balance = $account->balance;
            $new_balance = $old_balance + $referral->bonus;
            $withdrawn = $account->update(['balance' => $new_balance]);
        }
        $referral->update(['bonus' => 0, 'is_withdrawn' => 1]);

        return redirect()->back()->with('message', 'Bonus has been withdrawn to Account Balance');
    }
}
