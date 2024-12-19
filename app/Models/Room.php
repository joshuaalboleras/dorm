<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    /**
     * Get the bookings for the room.
     */

     protected $fillable = [
        'room_name',        // Room name
        'room_type',        // Room name
        'capacity'    // Room capacity
    ];

    public function bookings()
    {
        return $this->hasMany(Booking::class,'room_id');
    }
}
