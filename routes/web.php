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