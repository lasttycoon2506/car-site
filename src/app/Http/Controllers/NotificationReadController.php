<?php

namespace App\Http\Controllers;

use Illuminate\Notifications\DatabaseNotification;

class NotificationReadController extends Controller
{
    public function __invoke(DatabaseNotification $notification)
    {
        $notification->markAsRead();
    }
}
