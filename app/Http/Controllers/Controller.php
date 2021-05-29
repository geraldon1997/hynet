<?php

namespace App\Http\Controllers;

use App\Mail\NotifyAdmin;
use App\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Mail;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function notifyAdmin($subject, $message)
    {
        $to = adminEmail();
        Mail::to($to)->send(new NotifyAdmin($subject, $message));
    }
}
