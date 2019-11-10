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


Route::group(['prefix' => '/'], function ($router) {
  Route::get('/', 'HomeController@index');
  Route::get('/tentang-kami', 'HomeController@tentangPage');
  Route::get('/program-kerja', 'HomeController@programKerjPage');
  Route::get('/blog', 'BlogController@index');
});

Route::group(['prefix' => 'admin'], function ($router) {
  Route::get('/', function (){
    return redirect('/admin/dashboard');
  });
  Route::get('/login', 'portal\UserController@login');
  Route::post('/login', 'portal\UserController@loginPost');
  Route::post('/logout', 'portal\UserController@logout');
  Route::get('/dashboard', 'portal\DashboardController@index');
});
