<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $filters = $request->only(['priceForm', 'priceTo', 'beds', 'baths', 'areaForm', 'areaTo']);

        $query = Listing::mostRecent()
            ->filter($filters)
            ->paginate(10)->withQueryString();

        return Inertia::render('Listing/Index', [
            'filters' => $filters,
            'listings' => $query
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Listing $listing)
    {
        //one way of dealing with policies
        /*if (Auth::user()->can('view', $listing)) {
            abort(403);
        }*/
        //$this->authorize('view', $listing);

        return Inertia::render('Listing/Show', [
            'listing' => $listing
        ]);
    }

}
