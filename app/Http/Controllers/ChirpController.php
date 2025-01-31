<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Gate;
use Inertia\Inertia;
use App\Models\Chirp;
use Inertia\Response;
use Illuminate\Http\Request;
//use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class ChirpController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): Response
    {
        //return response('Hello, World!');
        return Inertia::render('Chirps/Index', [
            // เอาข้อมูลแล้วดึงขึ้นมา ข้อมูลอยู่ตรงโค้ดนี้ ข้อมูลมาตรงนี่เอา user id name
            'chirps' => Chirp::with('user:id,name')->latest()->get(),
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request): RedirectResponse//เข้าไปเห็นindex กับ store
    {
        //ตรวจต้องมีข้อมูลพิมย์ขึ้นมา
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $request->user()->chirps()->create($validated);
 
        return redirect(route('chirps.index'));
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Chirp $chirp)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Chirp $chirp)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, Chirp $chirp): RedirectResponse
    {
        //ทำงานร่วมกับนอลมอลไหล
        Gate::authorize('update', $chirp);
 
        $validated = $request->validate([
            'message' => 'required|string|max:255',
        ]);
 
        $chirp->update($validated);            //ส่วนแก้ไขข้อมูล
 
        return redirect(route('chirps.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    
     public function destroy(Chirp $chirp): RedirectResponse
    {
        //ตรวจสอบว่า ผู้ใช้ปัจจุบัน  มีสิทธิ์ดำเนินการ delete กับออบเจ็กต์ $chirp หรือไม่หลังจากลบสำเร็จแล้ว ให้ เปลี่ยนเส้นทาง (redirect) ผู้ใช้ไปที่หน้ารายการ chirps (เส้นทางของ chirps.index)

        Gate::authorize('delete', $chirp);
 
        $chirp->delete();
 
        return redirect(route('chirps.index'));
    }

}
