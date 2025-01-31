<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // กำหนดชื่อตาราง
    protected $table = 'students';

    // กำหนด Primary Key
    protected $primaryKey = 'StudentID';

    // ถ้าเป็น Integer (Auto-Increment)
    public $incrementing = true;
    protected $keyType = 'int'; 

    // ถ้าไม่มีฟิลด์ created_at และ updated_at ให้ปิด timestamps
    public $timestamps = false;

    // ระบุฟิลด์ที่สามารถถูกกรอกได้
    protected $fillable = [
        'StudentName',
        'Major',
        'Email',
        'Phone',
        
    ];

    // แปลงค่าให้อัตโนมัติ
    protected $casts = [
        'StudentID' => 'integer',
    ]
}
