<?php

//Route::redirect('/', '/login');

//Route::redirect('/home', '/admin');
Route::get('/', function () {
    return view('welcome');
})->name('home');
Route::get('/login/{social}','Auth\LoginController@socialLogin')->where('social','twitter|facebook|linkedin|google|github|bitbucket');

Route::get('/login/{social}/callback','Auth\LoginController@handleProviderCallback')->where('social','twitter|facebook|linkedin|google|github|bitbucket');
Auth::routes();
//Auth::routes(['register' => false]);
//Route::get('/home', 'HomeController@index')->name('home');

Route::group(["namespace" => "Dashboard" , "middleware" => ["auth"]], function()
{
	Route::get('/dashboard', [ "as" =>"dashboard", 'uses' => "DashboardController@index" ]);

});
Route::group([ 'prefix' => 'login', "as" => "login." , "namespace" => "Auth"],function()
{
	Route::get('/', [ 'as' => 'userlogin',  "uses" => "LoginController@login"] );
	Route::match(['post'],'/otp', [ 'as' => 'otp', "uses" => "LoginController@otp"] );
	Route::match(['post','get'],'/validate/otp', [ 'as' => 'validate.otp', "uses" => "LoginController@otpValidate"] );
});
Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');

    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');

    Route::resource('permissions', 'PermissionsController');

    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');

    Route::resource('roles', 'RolesController');

    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');

    Route::resource('users', 'UsersController');

    Route::delete('products/destroy', 'ProductsController@massDestroy')->name('products.massDestroy');

    Route::resource('products', 'ProductsController');

    Route::delete('destinations/destroy', 'DestinationsController@massDestroy')->name('destinations.massDestroy');

    Route::resource('destinations', 'DestinationsController');

    Route::delete('activities/destroy', 'ActivitiesController@massDestroy')->name('activities.massDestroy');

    Route::resource('activities', 'ActivitiesController');
    
});
