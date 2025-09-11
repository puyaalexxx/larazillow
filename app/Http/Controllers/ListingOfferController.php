<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use App\Models\Offer;
use App\Notifications\OfferMade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ListingOfferController extends Controller
{
    public function store(Listing $listing, Request $request)
    {
        // $this->authorize('view', $listing);
        Gate::authorize('view', $listing);

        $offer = $listing->offers()->save(
            Offer::make(
                $request->validate([
                    'amount' => 'required|integer|min:1|max:20000000'
                ])
            )->user()->associate($request->user())
        );

        //the notifications will be available for the listing owner not logged in user who made it
        $listing->owner->notify(
            new OfferMade($offer)
        );

        return redirect()->back()->with('success', 'Offer was made!');
    }
}
