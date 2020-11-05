<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
],

static function ($router) {
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::group(['middleware' => 'jwt.verify'], static function( $router){
    Route::post('refresh', 'AuthController@refresh');
    Route::get('user-profile', 'AuthController@userProfile');
    Route::get('user', 'AuthController@userList');
    Route::post('logout', 'AuthController@logout');
    Route::delete('userDelete/{id}', 'AuthController@destroy');
    });
});

