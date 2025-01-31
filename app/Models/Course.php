<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    //
    use HasFactory; // เพิ่มตรงนี้
    protected $primaryKey = 'CourseID';
    protected $fillable = ['CourseName', 'Credits', 'TeacherID'];

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'TeacherID');
    }

    public function registers()
    {
        return $this->hasMany(Register::class);
    }
}