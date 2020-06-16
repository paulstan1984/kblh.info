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

Route::get(env('R_ADMIN'), 'AdminController@index');

Route::get(env('R_ADMIN_LOGIN'), 'AdminLoginController@login');
Route::post(env('R_ADMIN_LOGIN'), 'AdminLoginController@dologin');
Route::get(env('R_ADMIN_LOGOUT'), 'AdminLoginController@logout');

Route::get(env('R_ADMIN').'/users', 'AdminUserController@index');
Route::post(env('R_ADMIN').'/users', 'AdminUserController@index');
Route::get(env('R_ADMIN').'/users/edit/{id}', 'AdminUserController@edit');
Route::post(env('R_ADMIN').'/users/edit/{id}', 'AdminUserController@save');
Route::get(env('R_ADMIN').'/users/delete/{id}', 'AdminUserController@delete');
Route::get(env('R_ADMIN').'/users/changepassword/{id}', 'AdminUserController@changepassword');
Route::post(env('R_ADMIN').'/users/changepassword/{id}', 'AdminUserController@savepassword');

Route::get(env('R_ADMIN').'/authors', 'AdminAuthorsController@index');
Route::post(env('R_ADMIN').'/authors', 'AdminAuthorsController@index');
Route::get(env('R_ADMIN').'/authors/edit/{id}', 'AdminAuthorsController@edit');
Route::post(env('R_ADMIN').'/authors/edit/{id}', 'AdminAuthorsController@save');
Route::get(env('R_ADMIN').'/authors/delete/{id}', 'AdminAuthorsController@delete');
