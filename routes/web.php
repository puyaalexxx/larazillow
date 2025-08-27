<?php

use App\Http\Controllers\ListingController;

//Route::get('/', [IndexController::class, 'index']);

//Route::get('/show', [IndexController::class, 'show']);

Route::resource('listing', ListingController::class);

