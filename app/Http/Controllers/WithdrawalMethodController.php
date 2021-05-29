<?php

namespace App\Http\Controllers;

use App\WithdrawalMethod;
use Illuminate\Http\Request;

class WithdrawalMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = WithdrawalMethod::orderBy('id', 'desc')->get();
        return view('dashboard.withdrawal_methods.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.withdrawal_methods.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stored = WithdrawalMethod::create($request->all());

        if ($stored) {
            return redirect(route('withdrawalmethod.index'))->with('message', 'New Withdrawal Method Added');
        }
        return redirect()->back()->withErrors(['error' => 'Withdrawal method was not added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\WithdrawalMethod  $withdrawalMethod
     * @return \Illuminate\Http\Response
     */
    public function show(WithdrawalMethod $withdrawalMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\WithdrawalMethod  $withdrawalMethod
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $method = WithdrawalMethod::find($id);
        return view('dashboard.withdrawal_methods.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\WithdrawalMethod  $withdrawalMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $updated = WithdrawalMethod::find($id)->update($request->all());

        if ($updated) {
            return redirect(route('withdrawalmethod.index'))->with('message', 'Withdrawal method updated');
        }
        return redirect()->back()->withErrors(['error' => 'withdrawal method not updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\WithdrawalMethod  $withdrawalMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = WithdrawalMethod::find($id)->delete();

        if ($deleted) {
            return redirect(route('withdrawalmethod.index'))->with('message', 'Withdrawal Method deleted');
        }
        return redirect()->back()->withErrors(['error' => 'withdrawal method not deleted']);
    }
}
