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

/* Route::get('/', function () {
    return view('home');
}); */


Route::get('/','RecordController@index');
Route::get('/create','RecordController@create');
Route::get('/year/{id}','RecordController@show');
Route::get('/all','RecordController@all');
Route::post('/store','RecordController@store');

Route::resource('ajax', 'AjaxController');

Auth::routes(['register' => false]);

Route::get('/home', 'RecordController@index')->name('home');
