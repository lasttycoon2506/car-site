<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index(Request $request)
    {
        $tab = $request->query("tab");

        return inertia(
            "Notification/Index",
            [
                "allNotifications" => $request
                    ->user()
                    ->notifications()
                    ->paginate(10)
                    ->appends(["tab" => $tab]),
                "unreadNotifications" => $request
                    ->user()
                    ->unreadNotifications()
                    ->paginate(10)
                    ->appends(["tab" => $tab]),
                "readNotifications" => $request
                    ->user()
                    ->readNotifications()
                    ->paginate(10)
                    ->appends(["tab" => $tab])
            ]
        );
    }
}
