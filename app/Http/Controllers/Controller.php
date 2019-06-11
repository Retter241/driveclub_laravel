<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use DB;
use View;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    protected $sudo;
 	protected $level;

 public function __construct() {

 	//share sudo and level of user 
 	

 /*	if (Auth::check()) {
 		$sudo = DB::table('users')->where('id',Auth::user()->id)->select('sudo')->get();
 		$level = DB::table('users')->where('id',Auth::user()->id)->select('level')->get();
 		
    // The user is logged in...
	}
	View::share('global_sudo',  $sudo);
	View::share('global_level',  $level);*/


 	//$this->all_countries = DB::table('countries')->get();
 	//$this->update_time = DB::table('settings')->where('s_key', 'update_time')->select('s_value')->get();
 	//$time = Settings::where('s_key', 'update_time')->first();
     //$this->update_time = $time->s_value;

     //view()->share('update_time',  $this->update_time);
     //view()->share('all_countries',  $this->all_countries);
 }
}
