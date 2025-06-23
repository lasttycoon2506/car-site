<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserCarsController extends Controller
{

    public function index(Request $request)
    {
        return inertia(
            "UserCars/Index"

        );
    }
}
