<?php

namespace App\Http\Controllers;

use App\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = PaymentMethod::all();
        return view('dashboard.payment_method.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.payment_method.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = [
            'name' => $request->name,
            'symbol' => $request->symbol,
            'address' => $request->address
        ];
        $created = PaymentMethod::firstorcreate($data);

        if ($created) {
            return redirect(route('paymentmethod.index'))->with('message', 'New Payment Method Added');
        }
        return redirect(route('paymentmethod.index'))->withErrors(['error' => 'Payment Method was Not Added']);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod, $id)
    {
        $method = $paymentMethod->find($id);
        return view('dashboard.payment_method.show', compact('method'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod, $id)
    {
        $method = $paymentMethod->find($id);
        return view('dashboard.payment_method.edit', compact('method'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod, $id)
    {
        $data = [
            'name' => $request->name,
            'symbol' => $request->symbol,
            'address' => $request->address
        ];
        $updated = $paymentMethod->find($id)->update($data);

        if ($updated) {
            return redirect(route('paymentmethod.index'))->with('message', 'Payment Method Updated');
        }
        return redirect(route('paymentmethod.index'))->withErrors(['error' => 'Payment Method Not Updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentMethod $paymentMethod, $id)
    {
        $deleted = $paymentMethod->find($id)->delete();

        if ($deleted) {
            return redirect(route('paymentmethod.index'))->with('message', 'Payment Method Deleted');
        }
        return redirect(route('paymentmethod.index'))->withErrors(['error' => 'Payment Method Not Deleted']);
    }
}
