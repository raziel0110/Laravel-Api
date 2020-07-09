<?php

use Illuminate\Support\Facades\Route;

Route::middleware('auth:api')->group(function () {
    Route::get('/contacts', 'ContactsController@index');
    Route::get('/contacts/{contact}', 'ContactsController@show');
    Route::post('/contacts', 'ContactsController@store');
    Route::patch('/contacts/{contact}', 'ContactsController@update');
    Route::delete('/contacts/{contact}', 'ContactsController@destroy');

    Route::get('/birthdays', 'BirthdaysController@index');
    Route::post('/search', 'SearchController@index');
});




