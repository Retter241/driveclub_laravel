<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|

https://stackoverflow.com/questions/35988648/call-to-a-member-function-save-on-null-laravel
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', 'Site\SiteController@index');//->name('index');


Route::get('/test', 'TestController@siteIndex');//->name('index');

Route::get('/search', 'Site\SiteController@search')->name('search');
Route::get('/about', 'Site\SiteController@About');//->name('index');
Route::get('/ads', 'Site\SiteController@getAds');
Route::get('/support', 'Site\SiteController@getSupport');


Route::get('/news', 'Site\SiteController@getNewsList')->name('news');
Route::get('/news/{alias}', 'Site\SiteController@getNewsItem');//->name('news');
Route::post('/news/add', 'Site\SiteController@addCommentPost');//->name('news');


Route::get('/projects', 'Site\SiteController@getProjectsList')->name('projects');
Route::get('/projects/{alias}', 'Site\SiteController@getProjectsItem');//->name('news');
Route::post('/projects/add', 'Site\SiteController@addCommentProject');//->name('news');



Route::get('projects/like/{id}', ['as' => 'project.like', 'uses' => 'Site\SiteController@likeProject']);
Route::get('news/like/{id}', ['as' => 'post.like', 'uses' => 'Site\SiteController@likePost']);



Route::get('users/{id}/follow', ['as' => 'user.follow', 'uses' => 'Site\SiteController@followUser']);
Route::get('users/{id}/unfollow', ['as' => 'user.unfollow', 'uses' => 'Site\SiteController@unfollowUser']);



Route::get('/category', 'Site\SiteController@getCategoryList');//->name('news');
Route::get('/category/{id}', 'Site\SiteController@getAllByCategory');//->name('news');


Route::get('/users', 'Site\SiteController@getUserList');//->name('news');
Route::get('/users/{id}', 'Site\SiteController@getUserItem');//->name('news');

/* Опросник Start */
Route::get('/polling', 'Site\SiteController@polling');//->name('index');
Route::post('/polling', 'Site\SiteController@polling');//->name('index');
/* Опросник End */

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/feeds', 'Site\SiteController@feeds');//->name('index');

Auth::routes();
/***************   Admin panel routes Start     ********************************/
Route::group(['prefix' => 'dashboard', 'middleware' => 'auth'], function () {
    Route::get('/', ['uses' => 'Dashboard\DashboardController@index', 'as' => 'dashboard']);
    Route::get('/test', 'TestController@dashboardIndex');//->name('index');

    Route::resource('post', 'PostController');
    Route::get('post/{id}', ['as' => 'edit', 'uses' => 'PostController@edit']);
    Route::post('post/{id}/edit', 'PostController@update');

    Route::any('multiupload', 'Dashboard\DashboardController@multiupload')->name('multiupload');
    //Route::get('post/multiupload','PostController@multiupload');


    //Permissions Spatie http://itsolutionstuff.com/post/laravel-56-user-roles-and-permissions-acl-using-spatie-tutorialexample.html
    //https://github.com/PrafullaKumarSahu/spatidemo
    //http://www.expertphp.in/article/laravel-5-4-user-role-and-permissions-with-spatie-laravel-permission
    //https://laravelcode.com/post/laravel-54-usesr-authorization-with-spatie-laravel-permission


//https://appdividend.com/2018/06/20/create-comment-nesting-in-laravel/
    Route::resource('comments', 'Dashboard\CommentController');
    Route::resource('categories', 'Dashboard\CategoryController');
    Route::resource('project', 'Dashboard\ProjectController');

    Route::post('project/{id}/edit', 'Dashboard\ProjectController@update');
    //Route::post('comment/store', 'Dashboard\CommentController@store')->name('comment.add');
    Route::resource('roles', 'Dashboard\RoleController');
    Route::resource('users', 'Dashboard\UserController');
    Route::resource('permissions', 'Dashboard\PermissionController');


    Route::post('project/addCommentProject', 'Dashboard\ProjectController@addCommentProject')->name('addcompr');

    Route::post('upload_image', 'Dashboard\DashboardController@uploadImage')->name('upload');


});
/***************   Admin panel routes End     ********************************/


//заглушка для статичного контента для использования src="{{URL::asset($pathFile)}}"
Route::get('/storage/{filename}', function ($filename) {
    $path = storage_path('public/' . $filename);
    if (!File::exists($path)) {
        abort(404);
    }
    $file = File::get($path);
    $type = File::mimeType($path);
    $response = Response::make($file, 200);
    $response->header("Content-Type", $type);
    return $response;
});
