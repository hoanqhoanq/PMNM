<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Đăng Ký</title>
</head>
<body>
    <h1>Đăng Ký Tài Khoản</h1>
    <form action="{{ route('auth.checkSignIn') }}" method="POST">
        @csrf
        <div>
            <label>Username:</label>
            <input type="text" name="username" required>
        </div>

        <div>
            <label>Password:</label>
            <input type="password" name="password" required>
        </div>

        <div>
            <label>Repass:</label>
            <input type="password" name="repass" required>
        </div>

        <div>
            <label>MSSV:</label>
            <input type="text" name="mssv" required>
        </div>

        <div>
            <label>Lopmonhoc:</label>
            <input type="text" name="lopmonhoc" required>
        </div>

        <div>
            <label>Gioitinh:</label>
            <select name="gioitinh" required>
                <option value="">Chọn giới tính</option>
                <option value="nam">Nam</option>
                <option value="nu">Nữ</option>
            </select>
        </div>

        <button type="submit">Sign In</button>
    </form>
</body>
</html>