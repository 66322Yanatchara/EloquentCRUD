<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Teacher extends Model
{
    //
    use HasFactory; // เพิ่มตรงนี้    protected $primaryKey = 'TeacherID';
    protected $fillable = ['TeacherName', 'Department', 'Email'];

    public function courses()
    {
        return $this->hasMany(Course::class, 'TeacherID');
    }
}