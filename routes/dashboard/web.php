<?php

use Illuminate\Support\Facades\Route;

    Route::prefix('dashboard')->name('dashboard.')->middleware(['auth'])->group(function (){

        Route::get('/index','DashboardController@index')->name('index');

        Route::resource('customers','CustomerController')->except(['show']);

        Route::resource('services','ServiceController');
    });
