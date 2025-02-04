<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primaryKey = 'StudentID';
    public $incrementing = true;
    protected $keyType = 'int';

    // อนุญาตให้ Laravel จัดการ timestamps อัตโนมัติ
    public $timestamps = true;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'StudentName',
        'Major',
        'Email',
        'Phone',
    ];

    protected $casts = [
        'StudentID' => 'integer',
    ];
    
    protected $guarded = [];
}
