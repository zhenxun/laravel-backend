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

Route::group(['prefix' => 'backend', 'namespace' => 'Backend', 'as' => 'admin.'], function(){

    Route::get('/login', 'LoginController@showLoginForm')->name('login');
    Route::post('/login', 'LoginController@login')->name('login.submit');
    Route::post('/logout', 'LoginController@logout')->name('logout');

    Route::group(['middleware' => ['auth:admin', 'backend-language']], function(){
        Route::get('/', 'DashboardController@index')->name('dashboard');
        Route::resource('news', 'NewsController');
        Route::resource('users', 'UsersController');
        Route::resource('attachments', 'AttachmentsController', ['only' => ['store', 'destroy']]);
        Route::get('api/attachments/{pages}', 'AttachmentsController@getArticles')->name('attachment.api');
        Route::resource('settings', 'SettingsController', ['only' => ['index', 'edit', 'update']]);
    });

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
