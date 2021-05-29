<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Plan extends Model
{
    protected $fillable = ['name', 'description','percentage','duration','min','max'];

    public static function validateForm()
    {
        $values = request()->validate(
            [
                'name' => 'required',
                'description' => 'required',
                'percentage' => 'required',
                'duration' => 'required',
                'min' => 'required',
                'max' => 'required'
            ]
        );
        return $values;
    }
}
