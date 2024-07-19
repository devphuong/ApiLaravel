<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends Controller
{
    /**
     * Xử lý đăng nhập và trả về JWT token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Xác thực người dùng
        if (!$token = JWTAuth::attempt($credentials)) {
            throw ValidationException::withMessages([
                'email' => ['Tài khoản hoặc mật khẩu không chính xác.'],
            ]);
        }

        // Trả về JWT token và địa chỉ chuyển hướng đến trang API
        return response()->json([
            'token' => $token,
            'redirect' => 'http://172.8.180.66:8000/api/product-management'
        ]);
    }
}
