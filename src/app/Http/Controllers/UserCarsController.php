<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCarsController extends Controller
{

    public function index()
    {
        return inertia(
            "UserCars/Index",
            ["userCars" => Auth::user()->cars()->paginate(8)]
        );
    }
}
