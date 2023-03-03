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
        return view('admin.rooms.index', [
            'rooms' => Room::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rooms.create', [
            'facilities' => Facility::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Room $room)
    {
        $facilities = $room->facilities()->select('facilities.id')->get()->map(fn($value) => $value->id)->toArray();

        return view('admin.rooms.edit', [
            'room' => $room,
            'facilities' => Facility::all(),
            'room_facilities' => $facilities
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
            $room->image_url = $request->image->store('images/rooms', 'public');
        }

        $room->facilities()->detach();

        $room->facilities()->attach($request->facilities);

        $room->save();

        return back()->with('success', 'Room updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return back()->with('success', 'Room deleted successfully');
    }
}
