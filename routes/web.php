<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/contact', function () {
    return view('contact');
})->name('contact-us');
Route::get('/change-password', function () {
    return view('change-password');
})->name('change-password');

Route::get('/my-bookings', function () {
    return view('my-bookings');
})->name('my-bookings');
Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/register', function () {
    return view('register');
})->name('register');
Route::get('/book', function () {
    return view('book');
})->name('book');



Route::get('/booking-details', function () {
    return view('booking-details');
})->name('home');

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::view('/admin/sliders/create', 'admin.create-slider')->name('admin.create-slider');
Route::view('/admin/sliders/edit', 'admin.edit-slider')->name('admin.edit-slider');

Route::view('/admin/facilities/create', 'admin.create-facility')->name('admin.create-facility');

Route::view('/admin/facilities/edit', 'admin.edit-facility')->name('admin.edit-facility');
Route::view('/admin/facilities', 'admin.facilities')->name('admin.facilities');

Route::view('/admin/rooms', 'admin.rooms')->name('admin.rooms');
Route::view('/admin/rooms/create', 'admin.create-room')->name('admin.rooms.create');
Route::view('/admin/rooms/edit', 'admin.edit-room')->name('admin.rooms.edit');

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::prefix('rooms')->group(function(){
        
    Route::get('/', [RoomController::class, 'index'])->name('rooms.index');
});

Route::prefix('bookings')->group(function(){
        
    Route::get('/', [BookingController::class, 'index'])->name('bookings.index');

    Route::get('/{room}/create', [BookingController::class, 'create'])->name('bookings.create');

    Route::post('/{room}/store', [BookingController::class, 'store'])->name('bookings.store');
});

Route::prefix('auth')->group(function(){
        
    Route::view('/login', 'auth.login')->name('auth.login');

    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    Route::view('/register', 'auth.register')->name('auth.register');

    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

    Route::view('/edit-account', 'auth.edit-account')->name('auth.edit-account');

    Route::patch('/edit-account', [AuthController::class, 'editAccount'])->name('auth.edit-account');

    Route::view('/change-password', 'auth.change-password')->name('auth.change-password');

    Route::patch('/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');

    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
});


Route::prefix('admin')->middleware('auth', 'can:admin')->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    
    Route::prefix('sliders')->group(function(){
        
        Route::get('/', [SliderController::class, 'index'])->name('admin.sliders.index');

        Route::get('/create', [SliderController::class, 'create'])->name('admin.sliders.create');

        Route::post('/store', [SliderController::class, 'store'])->name('admin.sliders.store');

        Route::get('/{slider}/edit', [SliderController::class, 'edit'])->name('admin.sliders.edit');

        Route::patch('/{slider}', [SliderController::class, 'update'])->name('admin.sliders.update');

        Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('admin.sliders.destroy');
    });

    Route::prefix('facilities')->group(function(){
        
        Route::get('/', [FacilityController::class, 'index'])->name('admin.facilities.index');

        Route::get('/create', [FacilityController::class, 'create'])->name('admin.facilities.create');

        Route::post('/store', [FacilityController::class, 'store'])->name('admin.facilities.store');

        Route::get('/{facility}/edit', [FacilityController::class, 'edit'])->name('admin.facilities.edit');

        Route::patch('/{facility}', [FacilityController::class, 'update'])->name('admin.facilities.update');

        Route::delete('/{facility}', [FacilityController::class, 'destroy'])->name('admin.facilities.destroy');
    });

    Route::prefix('rooms')->group(function(){
        
        Route::get('/', [AdminRoomController::class, 'index'])->name('admin.rooms.index');

        Route::get('/create', [AdminRoomController::class, 'create'])->name('admin.rooms.create');

        Route::post('/store', [AdminRoomController::class, 'store'])->name('admin.rooms.store');

        Route::get('/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.rooms.edit');

        Route::patch('/{room}', [AdminRoomController::class, 'update'])->name('admin.rooms.update');

        Route::delete('/{room}', [AdminRoomController::class, 'destroy'])->name('admin.rooms.destroy');
    });

    Route::prefix('settings')->group(function(){
        
        Route::get('/', [SettingController::class, 'index'])->name('admin.settings.index');

        Route::get('/edit', [SettingController::class, 'edit'])->name('admin.settings.edit');

        Route::patch('/', [SettingController::class, 'update'])->name('admin.settings.update');
    });

    Route::prefix('bookings')->group(function(){
        
        Route::view('/', 'admin.bookings')->name('admin.bookings.index');
    });

    Route::prefix('users')->group(function(){
    
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    });
});