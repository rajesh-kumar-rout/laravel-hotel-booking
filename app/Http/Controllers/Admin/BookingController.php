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
        $query = Booking::join('users', 'users.id', 'room_user.user_id')
            ->join('rooms', 'rooms.id', 'room_user.room_id')
            ->select(['users.email', 'room_user.check_in', 'room_user.check_out', 'rooms.room_no']);

        if($request->filter == 'canceled')
        {
            $query->where('room_user.is_canceled', true);
        }

        if($request->filter == 'past_booked')
        {
            $query->where('room_user.check_in', '<', date('Y-m-d'));
        }
         
        if($request->filter == 'future_booking')
        {
            $query->where('room_user.check_in', '>', date('Y-m-d'));
        }

        if($request->filter == 'today_booking')
        {
            $query->where('room_user.check_in', date('Y-m-d'));
        }

        if($request->search)
        {
            $query->where('users.email', 'like', '%' . $request->search .'%');
        }
         
        $bookings = $query->paginate(3);
        
        return view('admin.bookings', ['bookings' => $bookings]);
    }
}
