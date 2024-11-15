@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Chỉnh Sửa Sinh Viên</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('students.update', $student->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Tên</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $student->name }}" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" id="email" value="{{ $student->email }}" required>
        </div>
        <div class="form-group">
            <label for="age">Tuổi</label>
            <input type="number" class="form-control" name="age" id="age" value="{{ $student->age }}" required min="1">
        </div>
        <button type="submit" class="btn btn-primary">Cập nhật</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Quay
            lại</a>
    </form>
</div>
@endsection