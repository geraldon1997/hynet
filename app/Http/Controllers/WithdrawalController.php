<?php

namespace App\Http\Controllers;

use App\Mail\WithdrawalApproved;
use App\User;
use App\Withdrawal;
use App\WithdrawalMethod;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WithdrawalController extends Controller
{
    public function index()
    {
        $userid = auth()->user()->id;

        if (isAdmin()) {
            $withdrawals = Withdrawal::orderBy('id', 'desc')->get();
        } else {
            $withdrawals = Withdrawal::where('user_id', $userid)->get();
        }

        return view('dashboard.withdrawals.index', compact('withdrawals'));
    }

    public function update($id)
    {
        $withdrawal = Withdrawal::find($id);
        $withdrawal->update(['paid_on' => date('Y-m-d'), 'status' => 1]);
        $this->notifyUser($id);
        $this->notifyAdmin("Withdrawal Approved", "You have approved withdrawal of $".$withdrawal->amount." worth of ".WithdrawalMethod::find($withdrawal->withdrawal_method_id)->name." by ".User::find($withdrawal->user_id)->fullname);
        return redirect()->back()->with('message', 'Withdrawal Completed');
    }

    public function notifyUser($id)
    {
        $withdrawal = Withdrawal::find($id);
        $amount = $withdrawal->amount;
        $address = $withdrawal->address;
        $user = User::find($withdrawal->user_id);
        $fullname = $user->fullname;
        $to = $user->email;
        $message = "Your Withdrawal request of $$amount has been approved and sent to ". WithdrawalMethod::find($withdrawal->withdrawal_method_id)->name ." address ". $address;
        Mail::to($to)->send(new WithdrawalApproved($fullname, $message));
    }

    public function destroy($id)
    {
        $deleted = Withdrawal::find($id)->delete();

        if ($deleted) {
            return back()->with('message', 'Withdrawal Deleted');
        }
        return back()->withErrors(['error' => 'Withdrawal Not Delete']);
    }
}
