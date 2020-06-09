<?php

use Illuminate\Support\Facades\Route;

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

//ユーザートップページへのルート
Route::get('/home', 'StepController@index')->name('home');

//歩数追加時のルート
Route::post('/home/add', 'StepController@add')->name('add');

//歩数編集ページへのルート
Route::post('/home/edit', 'StepController@edit')->name('edit');

//歩数更新時のルート
Route::post('/home/update', 'StepController@update')->name('update');
