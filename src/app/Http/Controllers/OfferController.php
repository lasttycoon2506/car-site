<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Offer;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function store(Request $request, Car $car)
    {

        $car->offers()->save(Offer::make(
            $request->validate(["amount" => "required|integer|min:1|max:500000"])
        )->bidder()->associate($request->user()));


        return redirect()->back()->with("success", "offer made!");
    }
}
