<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Car;

class SellerController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Car::class, "car");
    }


    public function index()
    {
        return inertia(
            "Seller/Index",
            ["sellerCars" => Auth::user()->cars()->with("images")->paginate(9)]
        );
    }


    public function create()
    {
        return inertia(
            "Car/Create"
        );
    }


    public function store(Request $request)
    {
        $request->user()->cars()->create(
            $request->validate([
                "make" => "required",
                "model" => "required",
                "condition" => "required",
                "transmission" => "required",
                "drive_type" => "required",
                "year" => "required|integer|min:1930|max:2025",
                "mpg" => "required|integer|min:1|max:100",
                "miles" => "required|integer|min:1|max:200000",
                "price" => "required|integer|min:10000|max:100000",
            ])
        );

        return redirect()->route("seller.cars.index")->with("success", "car created!");
    }


    public function edit(Car $car)
    {
        $car->load(["images"]);

        return inertia(
            "Car/Edit",
            ["car" => $car]
        );
    }


    public function update(Request $request, Car $car)
    {
        $car->update($request->validate([
            "make" => "required",
            "model" => "required",
            "condition" => "required",
            "transmission" => "required",
            "drive_type" => "required",
            "year" => "required|integer|min:1930|max:2025",
            "mpg" => "required|integer|min:1|max:100",
            "miles" => "required|integer|min:1|max:200000",
            "price" => "required|integer|min:10000|max:100000",
        ]));

        return redirect()->route("seller.cars.index")->with("success", "car edited!");
    }


    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->route("seller.cars.index")->with("success", "car deleted!");
    }
}
