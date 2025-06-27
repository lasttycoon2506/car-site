<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class OfferController extends Controller
{
    public function store(Request $request, Car $car)
    {

        $car->offers()->create($request->validate(["amount" => "required|integer|min:1|max:500000"]))->Auth::user();

        return redirect()->back()->with("success", "offer made!");
    }
}
