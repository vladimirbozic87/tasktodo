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

Route::get('/', [
	       'uses' => '\App\Http\Controllers\HomeController@index',
           'as' => 'home'
]);


/**
*Authentication
*/

Route::get('/signin', [
           'uses' => '\App\Http\Controllers\AuthController@getSignin',
           'as' => 'auth.signin',
           'middleware' => ['guest'],
]);

Route::post('/signin', [
            'uses' => '\App\Http\Controllers\AuthController@postSignin',
            'middleware' => ['guest'],
]);

Route::get('/signup', [
           'uses' => '\App\Http\Controllers\AuthController@getSignup',
           'as' => 'auth.signup',
           'middleware' => ['guest'],
]);

Route::post('/signup', [
            'uses' => '\App\Http\Controllers\AuthController@postSignup',
            'middleware' => ['guest'],
]);

Route::get('/signout', [
           'uses' => '\App\Http\Controllers\AuthController@getSignout',
           'as' => 'auth.signout',
]);


/**
*user Profile
*/

Route::get('/user/{username}', [
    'uses' => '\App\Http\Controllers\ProfileController@getProfile',
    'as' => 'profile.index',
]);


/**
*Company
*/

Route::get('/company', [
    'uses' => '\App\Http\Controllers\CompanyController@getCompany',
    'as' => 'company.index',
]);

Route::post('/company', [
    'uses' => '\App\Http\Controllers\CompanyController@postCompany',
]);

Route::get('/project', [
    'uses' => '\App\Http\Controllers\CompanyController@getProject',
		'as' => 'company.project',
]);

Route::post('/project', [
    'uses' => '\App\Http\Controllers\CompanyController@postProject',
]);


/**
*Users
*/

Route::get('/users', [
    'uses' => '\App\Http\Controllers\UserController@getUsers',
		'as' => 'users.index',
]);

Route::post('/users', [
    'uses' => '\App\Http\Controllers\UserController@postUsers',
]);


/**
*Tasks
*/

Route::get('/tasks', [
    'uses' => '\App\Http\Controllers\TaskController@getTask',
		'as' => 'task.index',
]);

Route::post('/tasks', [
    'uses' => '\App\Http\Controllers\TaskController@postTask',
]);
