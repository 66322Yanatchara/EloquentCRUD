<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    use HasFactory;

    protected $primaryKey = 'CustomerID'; // กำหนด Primary Key เป็น CustomerID
    public $incrementing = true; // ใช้ Auto Increment
    protected $keyType = 'int'; // ระบุว่าเป็น integer

    protected $fillable = [
        'CustomerName',
        'Phone',
        'Email',
        'Address',
    ];
}