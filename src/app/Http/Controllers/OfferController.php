<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Offer;
use App\Notifications\OfferMade;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function store(Request $request, Car $car)
    {
        $this->authorize("view", $car);

        $offer = $car->offers()->save(Offer::make(
            $request->validate(["amount" => "required|integer|min:1|max:500000"])
        )->bidder()->associate($request->user()));

        $car->owner->notify(new OfferMade($offer));

        return redirect()->back()->with("success", "offer made!");
    }
}
