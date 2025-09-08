<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ListingController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Listing::class, 'listing');
    }

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
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->authorize('create', Listing::class);

        return Inertia::render('Listing/Create', [
            //'listings' => Listing::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->user()->listings()->create([
            ...$request->all(),
            ...$request->validate([
                'beds' => 'required|integer|min:0|max:20',
                'baths' => 'required|integer|min:0|max:20',
                'area' => 'required|integer|min:15|max:1500',
                'city' => 'required|string',
                'code' => 'required',
                'street' => 'required|string',
                'street_nr' => 'required|min:1|max:255',
                'price' => 'required|integer|min:1|max:2000000000',
            ])
        ]);

        return redirect()->route('listing.index')
            ->with('success', 'Listing created successfully.');
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

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Listing $listing)
    {
        return Inertia::render('Listing/Edit', [
            'listing' => $listing
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'beds' => 'required|integer|min:0|max:20',
            'baths' => 'required|integer|min:0|max:20',
            'area' => 'required|integer|min:15|max:1500',
            'city' => 'required|string',
            'code' => 'required',
            'street' => 'required|string',
            'street_nr' => 'required|min:1|max:255',
            'price' => 'required|integer|min:1|max:2000000000',
        ]);

        $listing = Listing::findOrFail($id);
        $listing->update($data);

        return redirect()->route('listing.edit', $listing)
            ->with('success', 'Listing updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Listing $listing)
    {
        $listing->delete();

        return redirect()->back()
            ->with('success', 'Listing deleted successfully.');
    }
}
