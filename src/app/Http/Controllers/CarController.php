<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CarController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Car::class, "car");
    }


    public function index(Request $request)
    {

        $filters = $request->only(["condition", "priceFrom", "priceTo", "transmission", "driveType", "miFrom", "miTo"]);

        return inertia(
            "Car/Index",
            [
                "filters" => $filters,
                "cars" => Car::with("images")
                    ->mostRecent()
                    ->filter($filters)
                    ->withoutSold()
                    ->paginate(8)
                    ->withQueryString()
            ]
        );
    }

    public function show(Car $car)
    {
        $car->load(["images"]);
        $offer = Auth::user() ? $car->offers()->byMe()->first() : null;

        return inertia(
            "Car/Show",
            [
                "car" => $car,
                "offerMade" => $offer
            ]
        );
    }
}
