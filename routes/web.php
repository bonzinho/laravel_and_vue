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
    return view('layouts.guest');
});

Route::get('/home', function(){
    return redirect()->route('admin.home');
});


Route::group(['prefix' => 'admin','as' => 'admin.'], function(){

    Route::get('login', 'Auth\LoginController@showLoginForm');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout');
    Route::group(['middleware' => 'can:access-super_admin'], function(){

        Route::get('/', function(){
            return redirect()->route('admin.home');
        });
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('export-subscribers', 'HomeController@exportSubscribers')->name('export-subscribers');
        Route::resource('noticias', 'NoticiasController', ['except' => 'show']);
        Route::resource('eventos', 'EventosController', ['except' => 'show']);
        Route::resource('instagram', 'InstagramsController', ['except' => ['show', 'edit', 'create']]);
        Route::get('instagram/list', 'InstagramsController@listFeeds')->name('listFeeds');
        Route::get('register_user', 'Auth\RegisterController@showRegistrationForm')->name('register_user');
        Route::post('register', 'Auth\RegisterController@register')->name   ('user.store');
        Route::get('user/list', function(){
            $users = \feupWorld\User::paginate(15);
            return view('admin.users.list', compact('users'));
        })->name('user_list');
        Route::resource('newsletter', 'NewslettersController');
        Route::resource('notificacao', 'NotificacaosController', ['except' => ['show', 'destroy']]);
        Route::resource('second-notificacao', 'SecondNotificacaosController', ['except' => ['show', 'destroy']]);
    });

});
