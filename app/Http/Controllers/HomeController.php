<?php

namespace App\Http\Controllers;

use App\Plan;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }
        $plans = Plan::all();
        return view('main.index', compact('plans'));
    }

    public function about()
    {
        return view('main.about');
    }

    public function team()
    {
        return view('main.team');
    }

    public function plans()
    {
        $plans = Plan::all();
        return view('main.plans', compact('plans'));
    }

    public function wapspeed()
    {
        return view('main.wapspeed');
    }

    public function whyUs()
    {
        return view('main.why_us');
    }

    public function contact()
    {
        return view('main.contact');
    }

    public function deploy()
    {
        /**
         * GIT DEPLOYMENT SCRIPT
         *
         * Used for automatically deploying websites via github or bitbucket, more deets here:
         *
         * https://gist.github.com/1809044
        */

        // The commands
        $commands = array(
            'echo $PWD',
            'whoami',
            'git pull',
            'git status',
            'git submodule sync',
            'git submodule update',
            'git submodule status',
        );

        // Run the commands for output
        $output = '';
        foreach ($commands as $command) {
            // Run it
            $tmp = shell_exec($command);
            // Output
            $output .= "<span style=\"color: #6BE234;\">\$</span> <span style=\"color: #729FCF;\">{$command}\n</span>";
            $output .= htmlentities(trim($tmp)) . "\n";
        }

        // Make it pretty for manual user access (and why not?)
        return view('deploy', compact('output'));
    }
}
