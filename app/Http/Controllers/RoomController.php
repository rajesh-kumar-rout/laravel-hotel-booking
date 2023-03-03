<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room::with('facilities')->get();

        return view('rooms', ['rooms' => $rooms]);
    }
}
