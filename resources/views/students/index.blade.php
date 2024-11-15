@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Danh Sách Sinh Viên</h1>

    <!-- Form tìm kiếm -->
    <form action="{{ route('students.index') }}" method="GET" class="mb-3">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="" value="{{ request('search') }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit"><i class="fa-solid fa-magnifying-glass"></i>
                    Search</button>
            </div>
        </div>
    </form>

    <!-- Nút Quay lại nếu có tìm kiếm -->
    @if(request()->has('search'))
    <a href="{{ route('students.index') }}" class="btn btn-secondary mb-3"><i class="fa-solid fa-arrow-left"></i> Quay
        lại</a>
    @endif

    <!-- Nút thêm sinh viên -->
    <a href="{{ route('students.create') }}" class="btn btn-success mb-3"><i class="fa-solid fa-plus"></i> Thêm Sinh
        Viên</a>

    <!-- Bảng danh sách sinh viên -->
    <table class="table table-striped">
        <thead>
            <tr>
                <th class="text-center">Họ Tên</th>
                <th class="text-center">Email</th>
                <th class="text-center">Tuổi</th>
                <th class="text-center">Ngày Tạo</th>
                <th class="text-center">Ngày Cập Nhật</th>
                <th class="text-center">Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td class="text-center">{{ $student->name }}</td>
                <td class="text-center">{{ $student->email }}</td>
                <td class="text-center">{{ $student->age }}</td>
                <td class="text-center">
                    {{ $student->created_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td>
                <td class="text-center">
                    {{ $student->updated_at->setTimezone('Asia/Ho_Chi_Minh')->format('d/m/Y H:i:s') }}</td>
                <td class="text-center">
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning btn-sm"><i
                            class="fa-regular fa-pen-to-square"></i> Chỉnh sửa </a>
                    <form action="{{ route('students.destroy', $student->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                            Xóa </button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection