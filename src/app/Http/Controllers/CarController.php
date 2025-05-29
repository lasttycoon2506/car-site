<?php

namespace App\Http\Controllers;

use App\Models\Car;
use Illuminate\Http\Request;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return inertia(
            "Car/Index",
            ["cars" => Car::all()]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia(
            "Car/Create"
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Car::create($request->all());

        return redirect()->route("car.index")->with("success", "car created!");
    }

    /**
     * Display the specified resource.
     */
    public function show(Car $car)
    {
        return inertia(
            "Car/Show",
            ["car" => $car]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
