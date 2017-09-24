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
*/

Route::get('/', function () {
    return view('welcome');
});

 Auth::routes();

Route::group(['middleware' => ['api','cors']], function () {
    Route::post('auth/login', 'ApiController@login');
	Route::get('user', 'ApiController@getAuthUser');
	Route::get('/home', 'HomeController@index')->name('home');
	Route::post('users/register', 'Auth\RegisterController@register');
	Route::post('users/login', 'Auth\LoginController@login');
	Route::post('users/socialLogin', 'Auth\LoginController@socialLogin');
	Route::post('users/registerDevice', 'DeviceController@registerDevice');
});

//Route::get('storage/{filename}', function ($filename)
//{
//    $path = storage_path('public/' . $filename);
//
//    if (!File::exists($path)) {
//        abort(404);
//    }
//
//    $file = File::get($path);
//    $type = File::mimeType($path);
//
//    $response = Response::make($file, 200);
//    $response->header("Content-Type", $type);
//
//    return $response;
//});