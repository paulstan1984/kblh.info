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


Route::get('/', 'PublicController@index');
Route::get(env('R_BOOKS'), 'PublicController@books');
Route::get(env('R_BOOK').'/{id}', 'PublicController@bookdetails');
Route::get(env('R_AUTHORS'), 'PublicController@authors');

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
Route::get(env('R_ADMIN').'/authors/search', 'AdminAuthorsController@search');
Route::get(env('R_ADMIN').'/authors/{id}/assignbook/{bookid}', 'AdminAuthorsController@assignbook');
Route::get(env('R_ADMIN').'/authors/{id}/unassignbook/{bookid}', 'AdminAuthorsController@unassignbook');

Route::get(env('R_ADMIN').'/categories', 'AdminCategoriesController@index');
Route::post(env('R_ADMIN').'/categories', 'AdminCategoriesController@index');
Route::get(env('R_ADMIN').'/categories/edit/{id}', 'AdminCategoriesController@edit');
Route::post(env('R_ADMIN').'/categories/edit/{id}', 'AdminCategoriesController@save');
Route::get(env('R_ADMIN').'/categories/delete/{id}', 'AdminCategoriesController@delete');
Route::get(env('R_ADMIN').'/categories/search', 'AdminCategoriesController@search');

Route::get(env('R_ADMIN').'/books', 'AdminBooksController@index');
Route::post(env('R_ADMIN').'/books', 'AdminBooksController@index');
Route::get(env('R_ADMIN').'/books/edit/{id}', 'AdminBooksController@edit');
Route::post(env('R_ADMIN').'/books/edit/{id}', 'AdminBooksController@save');
Route::get(env('R_ADMIN').'/books/delete/{id}', 'AdminBooksController@delete');
Route::get(env('R_ADMIN').'/books/search', 'AdminBooksController@search');
Route::get(env('R_ADMIN').'/books/{id}/assignauthor/{authorid}', 'AdminBooksController@assignauthor');
Route::get(env('R_ADMIN').'/books/{id}/unassignauthor/{authorid}', 'AdminBooksController@unassignauthor');
Route::get(env('R_ADMIN').'/books/{id}/assigncategory/{categoryid}', 'AdminBooksController@assigncategory');
Route::get(env('R_ADMIN').'/books/{id}/unassigncategory/{categoryid}', 'AdminBooksController@unassigncategory');

Route::get(env('R_ADMIN').'/books/{bookid}/chapters/{id}/{parentid}', 'AdminBooksController@editchapter');
Route::post(env('R_ADMIN').'/books/{bookid}/chapters/{id}/{parentid}', 'AdminBooksController@savechapter');
Route::get(env('R_ADMIN').'/books/{bookid}/deletechapter/{id}', 'AdminBooksController@deletechapter');

Route::get(env('R_ADMIN').'/booksection/{id}/up', 'AdminBooksController@sectionmoveup');
Route::get(env('R_ADMIN').'/booksection/{id}/down', 'AdminBooksController@sectionmovedown');
