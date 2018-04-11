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

Route::get('/', 'MainController@index')->middleware('web');
Route::get('/login','MainController@login');
Route::get('/{id?}', 'AdController@showAd')->where('id', '[0-9]+');


Route::post('/login','MainController@login')->middleware('AuthOrReg')->name('login');
Route::post('/logout','MainController@logout')->name('logout');

Route::group(['middleware' => 'auth'], function () {

    Route::get('/delete/{id}', 'AdController@delete')->where('id', '[0-9]+');

    Route::match(['get', 'post'],'/edit',[
        'uses' => 'AdController@create',
        'as' => 'create',
    ]);
    Route::match(['get', 'post'],'/edit/{id}',[
        'uses' => 'AdController@edit',
        'as' => 'edit',
    ]);

});






