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
//业务员模块
    Route::prefix('sln')->group(function () {
        //添加路由
        Route::get("create","SlnController@create");
        //ajax
        Route::get("ajaxName","SlnController@ajaxName");
        //执行添加路由
        Route::post("store","SlnController@store")->name("slnstore");
        //展示路由
        Route::get("index","SlnController@index");
        //展示加点击该
        Route::get("ajaxunp","SlnController@ajaxunp");
        //修改展示路由
        Route::get("edit/{id}","SlnController@edit");
        //修改执行页面
        Route::post("update/{id}","SlnController@update")->name("slnupdate");
        //删除展示路由
        Route::get("destroy/{id}","SlnController@destroy");
    });
//业务员模块
Route::prefix('ctr')->group(function () {
    //添加路由
    Route::get("create","CtrController@create");
    //ajax
    Route::get("ajaxName","CtrController@ajaxName");
    //执行添加路由
    Route::post("store","CtrController@store")->name("ctrstore");
    //展示路由
    Route::get("index","CtrController@index");
    //展示加点击该
    Route::get("ajaxunp","CtrController@ajaxunp");
    //修改展示路由
    Route::get("edit/{id}","CtrController@edit");
    //修改执行页面
    Route::post("update/{id}","CtrController@update")->name("ctrupdate");
    //删除展示路由
    Route::get("destroy/{id}","CtrController@destroy");
});