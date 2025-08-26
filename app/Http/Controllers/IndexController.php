<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Inertia\Inertia;

class IndexController extends Controller
{
    public function index()
    {
        $listings = Listing::all();

        return Inertia::render('Index/Index', [
            'message' => 'Hello World!'
        ]);
    }

    public function show()
    {
        return Inertia::render('Index/Show');
    }
}
