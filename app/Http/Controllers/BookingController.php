<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Builder;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $bookings = $request->user()->bookings()->with('facilities')->orderByPivot('created_at', 'desc')->get();

        return view('bookings', ['bookings' => $bookings]);
    }

    public function cancel(Request $request, Booking $booking)
    {
        $booking->is_canceled = true;

        $booking->save();
        
        return back();
    }

    public function create(Room $room)
    {
        return view('book', ['room' => $room]);
    }

    public function store(Request $request, Room $room)
    {
        $request->validate([
            'check_in' => 'required|date',
            'check_out' => 'required|date',
        ]);

        if($request->check_in > $request->check_out)
        {
            return back()->withErrors(['check_in' => 'Invalid check in date'])->withInput();
        }

        $is_booked = Booking::where('room_id', $room->id)
            ->where(function($query) use ($request){

                $query->where('check_in', '<', $request->check_in)
                    ->where('check_out', '>', $request->check_in);

                $query->where(function(Builder $query) use ($request){
                    $query->where('check_in', '<', $request->check_in)
                        ->where('check_out', '>', $request->check_in);
                });

                $query->orWhere(function(Builder $query) use ($request){
                    $query->orWhere('check_in', '=', $request->check_in);
                });

                $query->orWhere(function(Builder $query) use ($request){
                    $query->where('check_in', '<', $request->check_out)
                        ->where('check_out', '>=', $request->check_out);
                });

                $query->orWhere(function(Builder $query) use ($request){
                    $query->where('check_in', '<', $request->check_out)
                        ->where('check_out', '<', $request->check_out)
                        ->where('check_in', '>', $request->check_in);
                });
            })
            ->exists();

        if($is_booked)
        {
            return back()->withErrors(['check_in' => 'Room not available on this date'])->withInput();
        }        
        
        $request->user()->bookings()->attach($room->id, [
            'check_in' => $request->check_in,
            'check_out' => $request->check_out,
        ]);

        return redirect()->route('bookings.index')->with('success', 'Room booked successfully');
    }
}
