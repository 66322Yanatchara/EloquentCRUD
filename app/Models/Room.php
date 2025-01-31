<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Room extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'RoomID';

    public function roomType()
    {
        return $this->belongsTo(RoomType::class, 'RoomTypeID');
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class, 'RoomID');
    }
}