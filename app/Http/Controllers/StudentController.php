<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        if ($search) {
            // Tìm kiếm theo tên hoặc email
            $students = Student::where('name', 'like', "%$search%")
                ->orWhere('email', 'like', "%$search%")
                ->get();
        } else {
            $students = Student::all();
        }

        return view('students.index', compact('students'));
    }


    // Hiển thị form tạo sinh viên mới
    public function create()
    {
        return view('students.create');
    }

    // Lưu sinh viên mới
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'age' => 'required|integer|min:0',
        ]);

        Student::create($validatedData);
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được thêm!');
    }

    // Hiển thị form chỉnh sửa sinh viên
    public function edit($id)
    {
        $student = Student::findOrFail($id);
        return view('students.edit', compact('student'));
    }

    // Cập nhật thông tin sinh viên
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email,' . $id,
            'age' => 'required|integer|min:0',
        ]);

        $student = Student::findOrFail($id);
        $student->update($validatedData);
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được cập nhật!');
    }

    // Xóa sinh viên
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect()->route('students.index')->with('success', 'Sinh viên đã được xóa!');
    }
}
