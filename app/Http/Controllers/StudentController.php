<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Inertia\Inertia;

class StudentController extends Controller
{
    /**
     * แสดงรายการข้อมูลนักศึกษาทั้งหมด
     */
    public function index(Request $request) // เพิ่มตัวแปร $request เพื่อรับค่าจากคำขอ
    {
        // รับค่าคำค้นหาจาก input ชื่อ 'search' ที่มาจากหน้าเว็บ
        $query = $request->input('search');

        $students = Student::query()
            ->where('StudentID', 'like', '%' . $query . '%')
            ->orWhere('StudentName', 'like', '%' . $query . '%')  // ใช้ StudentName แทน FirstName
            ->orWhere('Email', 'like', '%' . $query . '%')
            ->orWhere('Phone', 'like', '%' . $query . '%')
            ->paginate(10)
            ->appends(['search' => $query]);



        // ส่งข้อมูลนักศึกษาและคำค้นหาไปยังหน้า Inertia 'Student/Index'
        return Inertia::render('Student/Index', [
            'students' => $students,
            'query' => $query,
        ]);
    }

    /**
     * แสดงฟอร์มสำหรับการสร้างข้อมูลนักศึกษาใหม่
     */
    public function create()
    {
        // ฟอร์มการสร้างนักศึกษาใหม่
    }

    /**
     * บันทึกข้อมูลนักศึกษาใหม่
     */
    public function store(Request $request)
    {
        // บันทึกข้อมูลนักศึกษาใหม่
    }

    /**
     * แสดงข้อมูลของนักศึกษาที่เลือก
     */
    public function show(Student $student)
    {
        // แสดงข้อมูลนักศึกษาที่เลือก
    }

    /**
     * แสดงฟอร์มสำหรับการแก้ไขข้อมูลนักศึกษาที่เลือก
     */
    public function edit(Student $student)
    {
        // ฟอร์มการแก้ไขข้อมูลนักศึกษา
    }

    /**
     * อัพเดตข้อมูลนักศึกษาที่เลือก
     */
    public function update(Request $request, Student $student)
    {
        // อัพเดตข้อมูลนักศึกษา
    }

    /**
     * ลบข้อมูลนักศึกษาที่เลือก
     */
    public function destroy(Student $student)
    {
        // ลบข้อมูลนักศึกษา
    }
}
