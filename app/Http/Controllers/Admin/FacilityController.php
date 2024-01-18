<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facility;

class FacilityController extends Controller
{
    public function index()
    {
        return view('admin.facility.index', [
            'facilities' => Facility::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:2|max:255|unique:facilities,name'
        ]);

        Facility::create([
            'name' => $request->name
        ]);

        return back()->with('success', 'Facility created successfully');
    }

    public function edit(Facility $facility)
    {
        return view('admin.facility.facility', ['facility' => $facility]);
    }


    public function update(Request $request, Facility $facility)
    {
        $request->validate([
            'name' => 'required|min:2|max:255|unique:facilities,name,' . $facility->id
        ]);

        $facility->name = $request->name;

        $facility->save();

        return redirect()->route('admin.facility.index')->with('success', 'Facility updated successfully');
    }

    public function destroy(Facility $facility)
    {
        $facility->delete();

        return back()->with('success', 'Facility deleted successfully');
    }
}
