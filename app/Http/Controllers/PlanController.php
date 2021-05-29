<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Plan $plan)
    {
        $plans = $plan->all();
        return view('dashboard.plans.index', compact('plans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.plans.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $values = Plan::validateForm();
        $stored = Plan::create($values);

        if ($stored) {
            return redirect(route('plans.index'))->with('message', 'Plan added');
        }
        return redirect()->back()->withErrors(['error' => 'Plan no added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function show(Plan $plan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $plan = Plan::find($id);
        return view('dashboard.plans.edit', compact('plan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $values = Plan::validateForm();
        $updated = Plan::find($id)->update($values);

        if ($updated) {
            return redirect(route('plans.index'))->with('message', 'plan updated');
        }
        return redirect()->back()->withErrors(['error' => 'plan not updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleted = Plan::find($id)->delete();

        if ($deleted) {
            return redirect(route('plans.index'))->with('message', 'Plan Deleted');
        }
        return redirect(route('plans.index'))->withErrors(['error' => 'Plan Not Deleted']);
    }
}
