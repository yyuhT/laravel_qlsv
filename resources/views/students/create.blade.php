@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="text-center">Thêm Sinh Viên</h1>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Họ Tên:</label>
            <input type="text" class="form-control" name="name" id="name" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" name="email" id="email" placeholder="" required>
        </div>
        <div class="form-group">
            <label for="age">Tuổi:</label>
            <input type="number" class="form-control" name="age" id="age" placeholder="" required min="1">
        </div>
        <button type="submit" class="btn btn-primary"><i class="fa-solid fa-plus"></i> Thêm</button>
        <a href="{{ route('students.index') }}" class="btn btn-secondary"><i class="fa-solid fa-arrow-left"></i> Quay
            lại</a>
    </form>
</div>
@endsection