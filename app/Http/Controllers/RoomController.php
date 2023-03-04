<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Facades\DB;


class RoomController extends Controller
{
    public function index(Request $request)
    {
        if($request->check_in > $request->check_out)
        {
            return redirect()->route('rooms.index');
        }
        if($request->check_in)
        {
            $room_ids = DB::table('room_user')
            ->where(fn($query) => $query->where('check_in', '<', $request->check_in)
                                ->where('check_out', '>', $request->check_in))
            
            ->orWhere(fn($query) =>  $query->where('check_in', '=', $request->check_in))

            ->orWhere(fn($query) =>  $query->where('check_in', '<', $request->check_out)
                                    ->where('check_out', '>=', $request->check_out))
            
            ->orWhere(fn($query) =>  $query->where('check_in', '<', $request->check_out)
                                ->where('check_out', '<', $request->check_out)
                                ->where('check_in', '>', $request->check_in))
->select('room_id')
            ->get()
            ->map(fn($room) => $room->room_id);

        // dd($room_ids);

            $query = Room::whereNotIn('id', $room_ids);

            if($request->adults)
            {
                $query->where('adults', $request->adults);
            }

            if($request->children)
            {
                $query->where('children', $request->children);
            }
            
            $rooms = $query->with('facilities')->get();

        return view('rooms', ['rooms' => $rooms]);

        }



        $rooms = Room::with('facilities')->get();

        return view('rooms', ['rooms' => $rooms]);
    }
}
