<?php

namespace App\Http\Controllers;

use App\Job;
use App\Template;
use Illuminate\Http\Request;

class HomeController  extends JoshController
{
    /**
     * Return the welcome page
     *
     * @return View
     */
    public function getWelcome(){
        $templates = Template::where('assign_value', '1')->get();
        $jobs = Job::orderby('order_id')->where('is_active', '1')->get();
        return view('welcome', [ 'template' => $templates[0], 'jobs' => $jobs ]);
    }



}
