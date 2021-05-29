<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referral extends Model
{
    protected $fillable = ['referrer', 'referred', 'bonus', 'is_withdrawn'];
}
