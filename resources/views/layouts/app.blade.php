<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Management</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <style>
    body {
        background-image: url('https://i.pinimg.com/originals/49/cd/d8/49cdd838e8c6d7fe5e2dd55deead5567.gif');
        background-size: cover;
        background-position: center;

        height: 100vh;
        display: flex;
        justify-content: center;
        align-items: center;
        cursor: pointer;
    }

    /* Tạo hiệu ứng chuyển động cho ảnh nền */
    @keyframes moveBackground {
        0% {
            background-position: center;
            transform: scale(1);
        }

        100% {
            background-position: center;
            transform: scale(1.05);
        }
    }

    .container .input-group-append .btn-outline-secondary {
        background-color: blue;
        color: #fff
    }

    .container {
        background-color: rgba(255, 255, 255, 0.7);
        /* Màu trắng với độ trong suốt */
        padding: 20px;
        /* Thêm khoảng cách cho văn bản */
        border-radius: 10px;
        /* Bo góc */
    }

    h1 {
        color: #333;
        /* Màu chữ */
        text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
        /* Bóng chữ */
    }
    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>
</body>

</html>