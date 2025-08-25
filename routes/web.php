<?php

use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Index/Index');
});
