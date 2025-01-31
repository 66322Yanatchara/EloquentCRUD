<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RoomType extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'RoomTypeID';

    public function rooms()
    {
        return $this->hasMany(Room::class, 'RoomTypeID');
    }
}