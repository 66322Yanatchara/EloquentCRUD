<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\Guest;

class Booking extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'BookingID'; // กำหนด Primary Key

    protected $fillable = [
        'RoomID',
        'GuestID',
        'BookingDate',
        'CheckInDate',
        'CheckOutDate',
        'TotalAmount',
    ];

    // ความสัมพันธ์กับห้องพัก (Room)
    public function room()
    {
        return $this->belongsTo(Room::class, 'RoomID', 'RoomID');
    }

    // ความสัมพันธ์กับแขก (Guest)
    public function guest()
    {
        return $this->belongsTo(Guest::class, 'GuestID', 'GuestID');
    }
}