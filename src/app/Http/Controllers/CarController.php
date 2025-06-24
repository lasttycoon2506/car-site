<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;


class CarController extends Controller
{
    public function index(Request $request)
    {

        $filters = $request->only(["condition", "priceFrom", "priceTo", "transmission", "driveType", "miFrom", "miTo"]);

        return inertia(
            "Car/Index",
            [
                "filters" => $filters,
                "cars" => Car::mostRecent()->filter($filters)->paginate(8)->withQueryString()
            ]
        );
    }

    public function create()
    {
        return inertia(
            "Car/Create"
        );
    }
}
