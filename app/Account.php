<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['user_id', 'balance'];

    public static function validateWithdrawalForm()
    {
        $values = request()->validate([
            'method' => 'required',
            'address' => 'required'
        ], self::messages());

        return $values;
    }

    public static function messages()
    {
        return [
            'method.required' => 'Please Select a withdrawal method',
            'address' => 'Please fill yur withdrawal address'
        ];
    }
}
