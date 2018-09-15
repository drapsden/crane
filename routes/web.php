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

//Routing pages through the pages controllers
Auth::routes();

//Routing pages through the pages controllers

Route::get('/', 'HomeController@index');

//Routing everything about usres
Route::resource('users', 'UsersController');
Route::resource('freshers', 'FreshersController');
Route::resource('partners', 'PartnersController');
//Searching 
Route::get('users/{$search}', 'UsersController@search');

// Route::get('users/{$search}',function ($search) {
//     return $search;
// })->where('search', '[A-Za-z]+');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
