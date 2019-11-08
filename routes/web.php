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
    return view('app');
});

Route::group(['prefix' => 'admin'], function ($router) {
//  Route::get('/login', function () {
//    return View::make('portal/login');
//  });
  Route::get('/login', 'portal\UserController@login');
  Route::post('/login', 'portal\UserController@loginPost');

  Route::get('/dashboard', 'portal\DashboardController@index');

});
