<?php

namespace App\Http\Controllers;

use App\Models\MjuStudent;
use Illuminate\Http\Request;

class MjuStudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $students = MjuStudent::all(); 

        return $students;       
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
    public function store(Request $request)
    {
        //
        $validated = $request->validate([ //ส่งข้อมูลมายังตัว $request โดยใช้ validate ตรวจสอบข้อมูลที่ต้องแสดงและผลลัพธ์ ส่งให้ตัวแปร $validated
            'student_code' => 'required|string|max:15', 
            'first_name' => 'required|string|max:50', 
            'first_name_en' => 'required|string|max:50', 
            'major_id' => 'required|exists:majors,major_id', 
            'idcard' => 'required||digits:13', 
            'address' => 'required|string', 
            'phone' => 'required|string', 
            'email' => 'required|email', 
        ]); 

        MjuStudent::create($validated); //บันทึกข้อมูลที่ตรวจสอบแล้วโดยใช้เมธอด create

        return response()->json(['message' => 'Student created successfully'], 201); //หากเจอข้อมูลจะสร้าง json response ระบุข้อความ
    }

    /**
     * Display the specified resource.
     */
    public function show(MjuStudent $mjuStudent, $student_code)
    {
        $mjuStudent = MjuStudent::where('student_code', $student_code)->first(); //ค้นหาข้อมูลใช้ student_code ใช้เมธอด first แสดงตัวแลกที่ค้นพบหลังจากการเรียงลำดับ

        return response()->json(['message' => 'Student show successfully', 'data' => $mjuStudent], 201); //หากเจอข้อมูลจะสร้าง json response ระบุข้อความและข้อมูล
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MjuStudent $mjuStudent)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, MjuStudent $mjuStudent, $student_code)
    {
        $mjuStudent = MjuStudent::where('student_code', $student_code)->first();

        $validated = $request->validate([
            'first_name' => 'required|string|max:50',
            
        ]);

        $mjuStudent->update($validated);

        return response()->json(['message' => 'Student updated successfully', 
        'data' => $validated, 'student_code' => $mjuStudent->student_code,], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, MjuStudent $mjuStudent, $student_code)
    {
        $mjuStudent = MjuStudent::where('student_code', $student_code)->first();

        $mjuStudent->delete($mjuStudent->student_code);

        return response()->json(['message' => 'Delete Student successfully', 
        'student_code' => $mjuStudent->student_code,], 200);
    }
}
