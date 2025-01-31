<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guest extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'GuestID'; // กำหนดให้ GuestID เป็น Primary Key
    public $timestamps = true; // ใช้ timestamp

    protected $fillable = [
        'GuestName', 'Phone', 'Email', 'Address',
    ];
}
