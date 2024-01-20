<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Room;
use App\Models\Facility;

class RoomController extends Controller
{
    public function index()
    {
        return view('admin.room.index', [
            'rooms' => Room::all()
        ]);
    }

    public function create()
    {
        return view('admin.room.room', [
            'facilities' => Facility::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'room_no' => 'required|unique:rooms,room_no',
            'name' => 'required|min:2|max:255',
            'beds' => 'required|min:2|max:255',
            'description' => 'required|min:2|max:255',
            'image' => 'required|image',
            'adults' => 'required|integer',
            'children' => 'required|integer',
            'price' => 'required|integer',
            'facilities' => 'required|array',
            'facilities.*' => 'required|integer|exists:facilities,id'
        ]);

        $room = Room::create([
            'name' => $request->name,
            'description' => $request->description,
            'image_url' => $request->image->store('images/rooms', 'public'),
            'room_no' => $request->room_no,
            'beds' => $request->beds,
            'adults' => $request->adults,
            'children' => $request->children,
            'price' => $request->price
        ]);

        $room->facilities()->attach($request->facilities);

        return back()->with('success', 'Room created successfully');
    }

    public function edit(Room $room)
    {
        $facilities = $room->facilities()->select('facilities.id')->get()->map(fn($value) => $value->id)->toArray();

        return view('admin.room.room', [
            'room' => $room,
            'facilities' => Facility::all(),
            'room_facilities' => $facilities
        ]);
    }

    public function update(Request $request, Room $room)
    {
        $request->validate([
            'room_no' => 'required|unique:rooms,room_no,' . $room->id,
            'name' => 'required|min:2|max:255',
            'beds' => 'required|min:2|max:255',
            'description' => 'required|min:2|max:255',
            'image' => 'nullable|image',
            'adults' => 'required|integer',
            'children' => 'required|integer',
            'price' => 'required|integer',
            'facilities.*' => 'required|integer'
        ]);

        $room->name = $request->name;
        $room->description = $request->description;
        $room->room_no = $request->room_no;
        $room->beds = $request->beds;
        $room->adults = $request->adults;
        $room->children = $request->children;
        $room->price = $request->price;

        if($request->image)
        {
            $imgUrl = $room->image_url;

            $room->image_url = $request->image->store('images/rooms', 'public');

            unlink(public_path("uploads/$imgUrl"));
        }

        $room->facilities()->detach();

        $room->facilities()->attach($request->facilities);

        $room->save();

        return back()->with('success', 'Room updated successfully');
    }

    public function destroy(Room $room)
    {
        $imgUrl = $room->image_url;

        $room->delete();

        unlink(public_path("uploads/$imgUrl"));

        return back()->with('success', 'Room deleted successfully');
    }
}
