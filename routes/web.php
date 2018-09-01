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

//    Route::get('/{locale}', function ($locale) {
//        \App::setlocale($locale);
//        // DataBase
//        // users = Email , password , .. etc .. lan (ar)
//        return view('welcome');

});

Auth::routes();

Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

Route::resource('posts', 'PostController');
Route::put('/posts/{post}/restore', 'PostController@restore')->name('posts.restore');
Route::delete('/posts/{post}/force-delete', 'PostController@forceDelete')->name('posts.force-delete');