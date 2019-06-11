<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    //
    public function siteIndex() {

    	return view('test');
    }

    public function dashboardIndex () {

    	return view('dashboard.test');
    }
    
}
