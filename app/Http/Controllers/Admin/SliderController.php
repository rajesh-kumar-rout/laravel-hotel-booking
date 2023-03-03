<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.sliders.index', [
            'sliders' => Slider::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sliders.create');
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
            'title' => 'required|min:2|max:255',
            'description' => 'required|min:2|max:255',
            'image' => 'required|image'
        ]);

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $request->image->store('images/sliders', 'public'),
        ]);

        return back()->with('success', 'Slider created successfully');
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
    public function edit(Slider $slider)
    {
        return view('admin.sliders.edit', ['slider' => $slider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'required|min:2|max:255',
            'description' => 'required|min:2|max:255',
            'image' => 'nullable|image'
        ]);

        $slider->title = $request->title;

        $slider->description = $request->description;

        if($request->image)
        {
            $slider->image_url = $request->image->store('images/sliders', 'public');
        }

        $slider->save();

        return redirect()->route('admin.sliders.index')->with('success', 'Slider updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Slider $slider)
    {
        $slider->delete();

        return back()->with('success', 'Slider deleted successfully');
    }
}
