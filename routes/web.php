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

Route::get('/', 'MainPageController@index')->name('mainPage');
Route::get('/project', 'ProjectController@index')->name('project');
Route::get('/pay', 'DonationController@index')->name('pay');

Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin');
