<?php

namespace App;

use Error;
use Illuminate\Database\Eloquent\Model;

class Deposit extends Model
{
    protected $fillable = [
        'user_id','plan_id','payment_method_id','amount','roi','daily_profit','created_at','is_paid','paid_at','maturity_period','maturity_date','status'
    ];

    public static function validateForm()
    {
        $values = request()->validate([
            'plan_id' => 'required',
            'payment_method_id' => 'required',
            'amount' => "required|numeric"
        ], self::messages());

        return $values;
    }

    public static function messages()
    {
        return [
            'plan_id.required' => 'Please Choose a Plan',
            'payment_method_id.required' => 'Please choose a Payment Method',
            'amount.required' => 'Please enter a valid Amount'
        ];
    }
}
