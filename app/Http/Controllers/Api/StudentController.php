<?php

namespace App\Http\Controllers\Api;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;

class StudentController extends Controller
{
    // Lấy danh sách sinh viên
    public function index()
    {
        // Lấy tất cả sinh viên từ cơ sở dữ liệu
        $students = Student::all();

        // Trả về dữ liệu dưới dạng JSON
        return response()->json($students);
    }

    // Lấy thông tin một sinh viên
    public function show($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        return response()->json($student, Response::HTTP_OK);
    }

    // Thêm mới một sinh viên
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students,email',
            'age' => 'required|integer',
        ]);

        $student = Student::create($data);

        return response()->json($student, Response::HTTP_CREATED);
    }

    // Cập nhật thông tin sinh viên
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        $data = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:students,email,' . $id,
            'age' => 'sometimes|required|integer',
        ]);

        $student->update($data);

        return response()->json($student, Response::HTTP_OK);
    }

    // Xóa sinh viên
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return response()->json(['message' => 'Student not found'], Response::HTTP_NOT_FOUND);
        }

        $student->delete();

        return response()->json(['message' => 'Student deleted'], Response::HTTP_NO_CONTENT);
    }
}
