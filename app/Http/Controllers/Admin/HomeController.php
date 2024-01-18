<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use App\Models\Room;
use App\Models\Booking;
use App\Models\Facility;
use App\Models\User;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.home.index', [
            'total_sliders' => Slider::count(),
            'total_rooms' => Room::count(),
            'total_bookings' => Booking::count(),
            'total_facilities' => Facility::count(),
            'total_users' => User::count(),
        ]);
    }
}
