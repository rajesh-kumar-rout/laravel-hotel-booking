<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BookingController;

Route::get('/migrate', function(){
    return \Artisan::call('migrate'); 
});

Route::get('/seed', function(){
    return \Artisan::call('db:seed'); 
});

Route::get('/', [HomeController::class, 'index'])->name('index');

Route::get('/about', [HomeController::class, 'about'])->name('about');

Route::view('/contact', 'contact')->name('contact');

Route::prefix('rooms')->group(function(){
        
    Route::get('/', [RoomController::class, 'index'])->name('rooms.index');
});

Route::middleware('auth')->group(function(){
    
    Route::prefix('bookings')->group(function(){
        
        Route::get('/', [BookingController::class, 'index'])->name('bookings.index');
    
        Route::get('/{room}/create', [BookingController::class, 'create'])->name('bookings.create');
    
        Route::post('/{room}/store', [BookingController::class, 'store'])->name('bookings.store');
    
        Route::patch('/{booking}/cancel', [BookingController::class, 'cancel'])->name('bookings.cancel');
    });
});

Route::prefix('auth')->group(function(){
        
    Route::view('/login', 'auth.login')->name('auth.login');

    Route::post('/login', [AuthController::class, 'login'])->name('auth.login');

    Route::view('/register', 'auth.register')->name('auth.register');

    Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

    Route::middleware('auth')->group(function(){
        
        Route::view('/edit-account', 'auth.edit-account')->name('auth.edit-account');

        Route::patch('/edit-account', [AuthController::class, 'editAccount'])->name('auth.edit-account');

        Route::view('/change-password', 'auth.change-password')->name('auth.change-password');

        Route::patch('/change-password', [AuthController::class, 'changePassword'])->name('auth.change-password');

        Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    });
});

Route::prefix('admin')->middleware('auth', 'can:admin')->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
    
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
        
        Route::get('/', [AdminBookingController::class, 'index'])->name('admin.bookings.index');
    });

    Route::prefix('users')->group(function(){
    
        Route::get('/', [UserController::class, 'index'])->name('admin.users.index');
    });
});