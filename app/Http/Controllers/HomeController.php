<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Slider;

class HomeController extends Controller
{
    public function about()
    {
        return view('about', [
            'about' => Setting::first()->about_us
        ]);
    }

    public function index()
    {
        return view('index', [
            'sliders' => Slider::all()
        ]);
    }
}
