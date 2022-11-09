<?php

Route::group(['prefix' => 'site', 'namespace' => 'Site', 'as' => 'site.'], function(){
    Route::get('/', 'HomeController@index')->name('site');
    Route::post('/', 'HomeController@index')->name('search');
});

Route::group(['prefix' => 'admin', 'namespace' => 'Admin', 'as' => 'admin.'], function(){

    /** Formulário de Login */
    Route::get('/', 'AuthController@showLoginForm')->name('login');
    Route::post('/', 'AuthController@login')->name('login.do');

    /** Rotas Protegidas */
    Route::group(['middleware' => ['auth']], function(){

        /** Dashboard Home */
        Route::get('home', 'AuthController@home')->name('home');
    });

    /** Logout */
    Route::get('logout', 'AuthController@logout')->name('logout');

});
