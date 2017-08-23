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

//Route::get('/hd', function () {
//    echo 'get';
//});
//
//Route::match(['get', 'post'], '/hd', function () {
//    echo 'asd';
//});
//
//Route::get('user/{id}', function ($id) {
//    return 'User '.$id;
//});
//
//Route::get('user/{name?}', function ($name = null) {
//    return $name;
//});
//
//Route::get('user/{id}', function ($id) {
//    return 'User '.$id;
//})->where('id','[0-9]+');

//Route::get('/test', 'IndexController@index');

Route::group(['middleware' => ['web']], function(){
    Route::get('/', function () {
        return view('welcome');
    });

    Route::any('admin/login', 'Admin\LoginController@login');
    Route::get('admin/code', 'Admin\LoginController@code');
});

Route::group(['middleware' => ['web','admin.login'], 'prefix' => 'admin', 'namespace' => 'Admin'], function(){
    Route::get('index', 'IndexController@index');
    Route::get('info', 'IndexController@info');
    Route::get('quit', 'LoginController@quit');
    Route::any('pass', 'IndexController@pass');

    Route::post('cate/changeorder', 'CategoryController@changeOrder');
    Route::resource('category','CategoryController');
});