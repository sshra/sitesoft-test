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

/*
Route::get('/', function () {
    return view('welcome');
});
*/

Auth::routes();

Route::get('home', 'SitesoftController@showmain');
Route::get('/', 'SitesoftController@showmain');
Route::post('/', 'SitesoftController@editchatmess');
Route::post('chatmess/{id?}', 'SitesoftController@loadchatmess');
Route::post('delmess/{id?}', 'SitesoftController@delchatmess');
Route::get('logout', 'Auth\LoginController@logout');
Route::post('login', 'Auth\LoginController@authenticate');
