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
Route::get('/project/{project}', 'ProjectController@getSingleProject')->name('singleProject');
Route::get('/pay/{project}', 'PaymentController@payAction')->name('pay');

Auth::routes();

Route::group(['prefix' => 'admin', 'middleware' => 'auth'], function () {
    //admin
    Route::get('/', 'AdminController@index')->name('admin');

    //admin/project
    Route::group(['prefix' => 'project'], function () {
        Route::get('/', 'ProjectController@getAllProjects')->name('allProjects');
        Route::match(['get', 'post'], '/add', 'ProjectController@addProject')->name('addProject');
        Route::match(['get', 'post'], '/edit/{project}', 'ProjectController@editProject')->name('editProject');
        Route::post('/delete/{project}', 'ProjectController@deleteProject')->name('deleteProject');
    });

    //admin/tags
    Route::group(['prefix' => 'tags'], function () {
        Route::get('/', 'TagsController@execute')->name('tags');
        Route::match(['get', 'post'], '/add', 'TagsAddController@execute')->name('TagsAdd');
        Route::match(['get', 'post'], '/edit/{tag}', 'TagsEditController@execute')->name('TagsEdit');
        Route::post('/delete/{tag}', 'TagsDeleteController@execute')->name('TagsDelete');
    });

    //admin/donations
    Route::group(['prefix' => 'donations'], function () {
        Route::get('/', 'DonationController@getAllDonations')->name('allDonations');
        Route::match(['get', 'post'], '/add', 'DonationController@addDonation')->name('addDonation');
        Route::match(['get', 'post'], '/edit/{donation}', 'DonationController@editDonation')->name('editDonation');
        Route::post('/delete/{donation}', 'DonationController@deleteDonation')->name('deleteDonation');
    });
});
