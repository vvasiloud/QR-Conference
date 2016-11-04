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
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    CRUD::resource('menu-item', 'MenuItemCrudController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    CRUD::resource('attendees', 'AttendeeCrudController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    CRUD::resource('attendees-activity', 'AttendeeActivityCrudController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    CRUD::resource('venues', 'VenueCrudController');
});

Route::group(['prefix' => 'admin', 'middleware' => ['web', 'auth'], 'namespace' => 'Admin'], function () {
    CRUD::resource('auditoriums', 'AuditoriumCrudController');
});

Route::get('/checkin/{venue_id}/{attendee_id}', [
    'as'   => 'venue.checkin',
    'uses' => 'VenueController@checkin'
]);