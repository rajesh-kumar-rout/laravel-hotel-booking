<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Facility;
use App\Models\User;
use App\Models\Booking;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_no', 
        'name',
        'description', 
        'price', 
        'image_url',
        'beds',
        'adults',
        'children'
    ];

    public function facilities()
    {
        return $this->belongsToMany(Facility::class);
    }

    public function bookings()
    {
        return $this->belongsToMany(User::class, 'bookings')->withPivot('check_in', 'check_out', 'is_canceled', 'id')->withTimestamps();
    }
}
