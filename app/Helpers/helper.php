<?php

use App\User;

if (! function_exists('isAdmin')) {
    function isAdmin()
    {
        return User::isAdmin();
    }
}

if (! function_exists('support')) {
    function supportEmail()
    {
        return "support@hynetcapital.com";
    }
}

if (! function_exists('accountsEmail')) {
    function accountsEmail()
    {
        return "accounts@hynetcapital.com";
    }
}

if (! function_exists('adminEmail')) {
    function adminEmail()
    {
        return "admin@hynetcapital.com";
    }
}

if (! function_exists('infoEmail')) {
    function infoEmail()
    {
        return "info@hynetcapital.com";
    }
}

if (! function_exists('helloEmail')) {
    function helloEmail()
    {
        return "hello@hynetcapital.com";
    }
}
