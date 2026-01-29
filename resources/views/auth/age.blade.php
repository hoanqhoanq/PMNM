<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Nhập Tuổi</title>
</head>
<body>
    <h1>Nhập Tuổi Của Bạn</h1>
    
    @if(session('success'))
        <div>{{ session('success') }}</div>
    @endif
    
    @if(session('age'))
        <div>Tuổi hiện tại trong session: {{ session('age') }}</div>
    @endif
    
    <form action="{{ route('auth.storeAge') }}" method="POST">
        @csrf
        <div>
            <label>Tuổi:</label>
            <input type="number" name="age" min="1" max="120" required>
        </div>

        <button type="submit">Xác Nhận</button>
    </form>
    
    <div>
        <a href="{{ route('auth.signin') }}">Đi đến trang đăng ký</a>
    </div>
</body>
</html>