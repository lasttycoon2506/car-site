<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function create()
    {
        return inertia(
            "User/Create"
        );
    }

    public function store(Request $request)
    {
        $newUser = User::make($request->validate([
            "name" => "required",
            "email" => "required|email|unique:users",
            "condition" => "required|min:8|confirmed",
        ]));

        $newUser->save();

        Auth::login($newUser);

        return redirect()->route("car.index")->with("success", "Account Created, Welcome!");
    }
}
