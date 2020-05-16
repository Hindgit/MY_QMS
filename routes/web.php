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



Auth::routes();

Route::group(['middleware' => ['web','auth']], function(){


    Route::get('/service', function () {
            return view('service');
    });
    Route::get('/statistique', function () {
        return view('statistique');
    });
    Route::get('/display', function () {
        return view('display');
    });

    Route::get('/console', function () {
        return view('console');
    });
    Route::get('/google-line-chart', function () {
        return view('google-line-chart');
    });

    Route::get('/', 'ChartController@index');

    Route::get('/home', 'ChartController@index');

    Route::get('/', function () {
        if(Auth::user()->user_type_id == 3) {
            return view('operatorhome');
        }
    });

    Route::resource('users','UsersController');
    Route::resource('createuser', 'UsertypeController')->only([
        'index'
    ]);
    Route::put('/posts/update/{user}', 'UsersController@update')->name('posts.update');
    Route::get('/update/{id}', 'UsersController@showuser');


    Route::resource('consoles','ConsoleController');

    Route::resource('displays','DisplayController');

    Route::resource('services','ServiceController');
    Route::put('/pots/updat/{service}', 'ServiceController@update')->name('pots.updat');
    Route::get('/updat/{id}', 'ServiceController@showservice');

    Route::resource('officess','OfficeController');
    Route::get('/offices', 'UsersController@inde');
    Route::get('/upd/{id}', 'OfficeController@showoffice');
    Route::put('/offs/upd/{office}', 'OfficeController@update')->name('offs.update');

    Route::get('dashboard/{date1}/{date2}', 'ChartController@dashboard');
    Route::get('serviceoffice', 'ChartController@googleLineChart');



});
