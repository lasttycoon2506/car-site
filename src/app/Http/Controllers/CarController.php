<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;


class CarController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Car::class, "car");
    }

    public function index()
    {
        return inertia(
            "Car/Index",
            ["cars" => Car::orderByDesc("created_at")->paginate(8)]
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
                "pictures" => "required"
            ])
        );

        return redirect()->route("car.index")->with("success", "car created!");
    }


    public function show(Car $car)
    {
        return inertia(
            "Car/Show",
            ["car" => $car]
        );
    }


    public function edit(Car $car)
    {
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

        return redirect()->route("car.index")->with("success", "car edited!");
    }


    public function destroy(Car $car)
    {
        $car->delete();

        return redirect()->back()->with("success", "car deleted!");
    }
}
