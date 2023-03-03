<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    public function index(Request $request)
    {dd($request->user()->bookings()->with('facilities')->get()->toArray());
        return view('booking', [
            'booking' => $room 
        ]);
    }

    public function create(Room $room)
    {
        return view('book', [
            'room' => $room 
        ]);
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        if($request->check_in > $request->check_out)
        {
            return back()->withErrors(['check_in' => 'Invalid check in date'])->withInputs($request->all());
        }

        $is_booked = DB::table('room_user')
            ->where(fn($query) => $query->where('check_in', '<', $request->check_in)
                                ->where('check_out', '>', $request->check_in))
            
            ->orWhere(fn($query) =>  $query->where('check_in', '=', $request->check_in))

            ->orWhere(fn($query) =>  $query->where('check_in', '<', $request->check_out)
                                    ->where('check_out', '>=', $request->check_out))
            
            ->orWhere(fn($query) =>  $query->where('check_in', '<', $request->check_out)
                                ->where('check_out', '<', $request->check_out)
                                ->where('check_in', '>', $request->check_in))

            ->exists();

            dd($is_booked);
                            
        
        $request->user()->bookings()->attach($room->id, [
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return back();
    }
}
