<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Room;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'check_in', 'check_out', 'room_id'];

    public function user()
    {
        return $this->hasOne(User::class);
    }
    public function room()
    {
        return $this->hasOne(Room::class);
    }
}
