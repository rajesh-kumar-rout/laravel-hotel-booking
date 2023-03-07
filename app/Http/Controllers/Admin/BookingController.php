<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Room;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::join('users', 'users.id', 'bookings.user_id')
            ->join('rooms', 'rooms.id', 'bookings.room_id')
            ->select(['users.email', 'bookings.check_in', 'bookings.check_out', 'rooms.room_no']);

        if($request->filter == 'canceled')
        {
            $query->where('bookings.is_canceled', true);
        }

        if($request->filter == 'past_booked')
        {
            $query->where('bookings.check_in', '<', date('Y-m-d'));
        }
         
        if($request->filter == 'future_booking')
        {
            $query->where('bookings.check_in', '>', date('Y-m-d'));
        }

        if($request->filter == 'today_booking')
        {
            $query->where('bookings.check_in', date('Y-m-d'));
        }

        if($request->search)
        {
            $query->where('users.email', 'like', '%' . $request->search .'%');
        }
         
        $bookings = $query->paginate(3);
        
        return view('admin.bookings', ['bookings' => $bookings]);
    }
}
