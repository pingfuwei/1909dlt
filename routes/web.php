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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::any("/index","Controller@index");
//拜访会议
Route::prefix('acc')->group(function(){
    Route::get('create','AccController@create');
    Route::post('store','AccController@store');
    Route::get('index','AccController@index');
    Route::get('edit/{id}','AccController@edit');
    Route::post('update/{id}','AccController@update');
    Route::get('destroy/{id}','AccController@destroy');
    Route::get('ajaxjd','AccController@ajaxjd');
});

//Route::any("/admin","Controller@admin");
//
//后台管理员添加路由
Route::prefix("admin")->middleware("is_login")->group(function (){
    Route::any('create','AdminController@create');
    Route::post('store','AdminController@store');
    Route::get('index','AdminController@index');
    Route::get('destroy/{id?}','AdminController@destroy');
    Route::get('edit/{id?}','AdminController@edit');
    Route::post('update/{id?}','AdminController@update');
    Route::get('/aja','AdminController@aja');
    Route::get('/admin_jd','AdminController@admin_jd');
});
//后台登陆路由
Route::prefix("login")->group(function (){
    Route::any('login','LoginController@login');
    Route::any('loginDo','LoginController@loginDo');
});
//首页
Route::any('/admin','LoginController@index')->middleware("is_login");
//退出
Route::any('/login/quit','LoginController@quit')->middleware("is_login");

