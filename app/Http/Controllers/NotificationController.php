<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function __construct()
    {

    }

    public function read(){
        auth()->user()->unreadNotifications->markAsRead();
        return redirect()->back();

    }
}
