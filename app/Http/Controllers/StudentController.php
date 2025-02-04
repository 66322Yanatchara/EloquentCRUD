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
        return Inertia::render('Student/Create');
    }


    /**
     * บันทึกข้อมูลนักศึกษาใหม่
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'StudentName' => 'required',
            'Major' => 'required', // เพิ่ม Major
            'Email' => 'required|email|unique:students,Email',
            'Phone' => 'required',
        ]);

        Student::create([
            'StudentName' => $validated['StudentName'],
            'Major' => $validated['Major'],
            'Email' => $validated['Email'],
            'Phone' => $validated['Phone'],
        ]);

        return redirect()->route('students.index')->with('success', 'Student added successfully.');
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
    public function edit($StudentID)
    {
        $student = Student::where('StudentID', $StudentID)->firstOrFail();
        return Inertia::render('Student/Edit', ['student' => $student]);
    }
    

    /**
     * อัพเดตข้อมูลนักศึกษาที่เลือก
     */
    public function update(Request $request, $StudentID)
    {
        $request->validate([
            'StudentName' => 'required',
            'Major' => 'required',
            'Email' => 'required|email|unique:students,Email,' . $StudentID . ',StudentID',
            'Phone' => 'required',
        ]);
    
        $student = Student::where('StudentID', $StudentID)->firstOrFail();
        $student->update($request->all());
    
        return redirect()->route('students.index')->with('success', 'Student updated successfully.');
    }
    

    /**
     * ลบข้อมูลนักศึกษาที่เลือก
     */
    public function destroy($StudentID)
{
    $student = Student::where('StudentID', $StudentID)->firstOrFail();
    $student->delete();

    return redirect()->route('students.index')->with('success', 'Student deleted successfully.');
}

}
