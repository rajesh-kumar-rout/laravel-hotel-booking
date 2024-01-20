<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;

class SliderController extends Controller
{
    public function index()
    {
        return view('admin.slider.index', [
            'sliders' => Slider::all()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'nullable|string|min:2|max:255',
            'description' => 'nullable|string|min:2|max:255',
            'image' => 'required|image'
        ]);

        Slider::create([
            'title' => $request->title,
            'description' => $request->description,
            'image_url' => $request->image->store('images/sliders', 'public'),
        ]);

        return back()->with('success', 'Slider created successfully');
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.slider', ['slider' => $slider]);
    }

    public function update(Request $request, Slider $slider)
    {
        $request->validate([
            'title' => 'nullable|min:2|max:255',
            'description' => 'nullable|min:2|max:255',
            'image' => 'nullable|image'
        ]);

        $slider->title = $request->title;

        $slider->description = $request->description;

        if($request->image)
        {
            $imgUrl = $slider->image_url;

            $slider->image_url = $request->image->store('images/sliders', 'public');

            unlink(public_path("uploads/$imgUrl"));
        }

        $slider->save();

        return redirect()->route('admin.slider.index')->with('success', 'Slider updated successfully');
    }

    public function destroy(Slider $slider)
    {
        $imgUrl = $slider->image_url;

        $slider->delete();

        unlink(public_path("uploads/$imgUrl"));

        return back()->with('success', 'Slider deleted successfully');
    }
}
