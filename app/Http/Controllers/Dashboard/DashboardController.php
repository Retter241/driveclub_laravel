<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

//https://laracasts.com/discuss/channels/laravel/laravel-like-dislike-system?page=1
//https://mydnic.be/post/simple-like-system-with-laravel-5

class DashboardController extends Controller
{
    //
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('dashboard.index');
    }

    public function uploadImage (Request $request)
    {
    	$CKEditor = $request->input('CKEditor');
		$funcNum  = $request->input('CKEditorFuncNum');
		$message  = $url = '';
	if (Input::hasFile('upload')) {
		$file = Input::file('upload');
		if ($file->isValid()) {
			$filename =rand(1000,9999).$file->getClientOriginalName();
			$file->move(public_path().'/dashboards/image/', $filename);
			$url = url('dashboards/image/' . $filename);
		} else {
			$message = 'An error occurred while uploading the file.';
		}
	} else {
		$message = 'No file uploaded.';
	}
	return '<script>window.parent.CKEDITOR.tools.callFunction('.$funcNum.', "'.$url.'", "'.$message.'")</script>';
    }




    /**
     * Ajax JQ upload
     *
     * @return \Illuminate\Http\Response
     */
    public function multiupload(Request $request)
    {
     
        return dd(Input::file('input-b9'));
     //return dd($request->file('input-b9'));
    }

}
