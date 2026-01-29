<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    private static $student = [
        'username' => 'HoangTH',
        'password' => '0031267',
        'mssv' => '0031267',
        'lopmonhoc' => '67PM1',
        'gioitinh' => 'Nam'
    ];

    public function SignIn()
    {
        return view('auth.signin');
    }

    public function CheckSignIn(Request $request)
    {
        $data = $request->only(['username', 'password', 'repass', 'mssv', 'lopmonhoc', 'gioitinh']);

        if ($data['password'] != $data['repass']) {
            return "Đăng ký thất bại";
        }

        if ($data['username'] == self::$student['username'] &&
            $data['password'] == self::$student['password'] &&
            $data['mssv'] == self::$student['mssv'] &&
            $data['lopmonhoc'] == self::$student['lopmonhoc'] &&
            $data['gioitinh'] == self::$student['gioitinh']) {
            return "Đăng ký thành công!";
        }

        return "Đăng ký thất bại";
    }

    public function age()
    {
        return view('auth.age');
    }

    public function storeAge(Request $request)
    {
        $request->session()->put('age', $request->input('age'));
        return redirect()->route('auth.age')->with('success', 'Tuổi đã được lưu vào session!');
    }
}