<?php

use App\Http\Controllers\AccountController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\FacilityController;
use App\Http\Controllers\Admin\RoomController as AdminRoomController;
use App\Http\Controllers\Admin\BookingController as AdminBookingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
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

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/about', [HomeController::class, 'about'])->name('home.about');

Route::view('/contact', 'home.contact')->name('home.contact');

Route::get('/rooms', [RoomController::class, 'index'])->name('room.index');

Route::prefix('bookings')->middleware('auth')->group(function(){
        
    Route::get('/', [BookingController::class, 'index'])->name('booking.index');

    Route::get('/{room}/create', [BookingController::class, 'create'])->name('booking.create');

    Route::post('/{room}/store', [BookingController::class, 'store'])->name('booking.store');

    Route::patch('/{booking}/cancel', [BookingController::class, 'cancel'])->name('booking.cancel');
});

Route::prefix("account")->group(function(){

    Route::middleware('guest')->group(function(){

        Route::view('/login', 'account.login')->name('account.login');

        Route::post('/login', [AccountController::class, 'login'])->name('account.login');
    
        Route::view('/register', 'account.register')->name('account.register');
    
        Route::post('/register', [AccountController::class, 'register'])->name('account.register');
    });

    Route::middleware('auth')->group(function(){

        Route::view('/edit', 'account.edit')->name('account.edit');

        Route::patch('/', [AccountController::class, 'editAccount'])->name('account.update');

        Route::prefix("password")->group(function(){

            Route::view('/change', 'account.password.change')->name('account.password.change');

            Route::patch('/change', [AccountController::class, 'changePassword'])->name('account.password.change');
        });

        Route::get('/logout', [AccountController::class, 'logout'])->name('account.logout');
    });
});

Route::prefix('admin')->middleware('auth', 'can:admin')->group(function(){

    Route::get('/', [AdminHomeController::class, 'index'])->name('admin.home.index');
    
    Route::prefix('sliders')->group(function(){
        
        Route::get('/', [SliderController::class, 'index'])->name('admin.slider.index');

        Route::view('/create', 'admin.slider.slider')->name('admin.slider.create');

        Route::post('/store', [SliderController::class, 'store'])->name('admin.slider.store');

        Route::get('/{slider}/edit', [SliderController::class, 'edit'])->name('admin.slider.edit');

        Route::patch('/{slider}', [SliderController::class, 'update'])->name('admin.slider.update');

        Route::delete('/{slider}', [SliderController::class, 'destroy'])->name('admin.slider.destroy');
    });

    Route::prefix('facilities')->group(function(){
        
        Route::get('/', [FacilityController::class, 'index'])->name('admin.facility.index');

        Route::view('/create', 'admin.facility.facility')->name('admin.facility.create');

        Route::post('/store', [FacilityController::class, 'store'])->name('admin.facility.store');

        Route::get('/{facility}/edit', [FacilityController::class, 'edit'])->name('admin.facility.edit');

        Route::patch('/{facility}', [FacilityController::class, 'update'])->name('admin.facility.update');

        Route::delete('/{facility}', [FacilityController::class, 'destroy'])->name('admin.facility.destroy');
    });

    Route::prefix('rooms')->group(function(){
        
        Route::get('/', [AdminRoomController::class, 'index'])->name('admin.room.index');

        Route::get('/create', [AdminRoomController::class, 'create'])->name('admin.room.create');

        Route::post('/store', [AdminRoomController::class, 'store'])->name('admin.room.store');

        Route::get('/{room}/edit', [AdminRoomController::class, 'edit'])->name('admin.room.edit');

        Route::patch('/{room}', [AdminRoomController::class, 'update'])->name('admin.room.update');

        Route::delete('/{room}', [AdminRoomController::class, 'destroy'])->name('admin.room.destroy');
    });

    Route::prefix('settings')->group(function(){
        
        Route::get('/', [SettingController::class, 'index'])->name('admin.setting.index');

        Route::get('/edit', [SettingController::class, 'edit'])->name('admin.setting.edit');

        Route::patch('/', [SettingController::class, 'update'])->name('admin.setting.update');
    });

    Route::get('/bookings', [AdminBookingController::class, 'index'])->name('admin.booking.index');

    Route::get('/users', [UserController::class, 'index'])->name('admin.user.index');
});