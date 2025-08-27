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
    public function index()
    {
        return Inertia::render('Listing/Index', [
            'listings' => Listing::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('Listing/Create', [
            //'listings' => Listing::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Listing::create([
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
    public function show(string $id)
    {
        return Inertia::render('Listing/Show', [
            'listing' => Listing::find($id)
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
