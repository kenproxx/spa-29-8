<?php

namespace App\Http\Controllers;

use App\Enum\UserStatus;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{

    public function showFormLogin()
    {
        return view('backend.pages.dang-nhap.index');
    }

    public function login(Request $request)
    {
        $emailLogin = $request->input('email');

        $credentials = [
            'email' => $emailLogin,
            'password' => $request->input('password'),
        ];

        $user = User::where('email', $emailLogin)->first();

        if ($user) {
            switch ($user->status) {
                case UserStatus::INACTIVE:
                    return back()->with('error', 'Tài khoản của bạn đã bị khóa, vui lòng liên hệ quản trị viên');
                case UserStatus::ACTIVE:
                    if (Auth::attempt($credentials)) {
                        $request->session()->put('login', $emailLogin);
                        $login = $request->session()->get('login');
                        return redirect()->route('backend.thong-ke.show');
                    } else {
                        return back()->with('error', 'Sai thông tin tài khoản hoặc mật khẩu');
                    }
                default:
                    return back()->with('error', 'Tài khoản của bạn bị xóa');
            }
        } else {
            return back()->with('error', 'Tên đăng nhập hoặc mật khẩu không chính xác');
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('login');

        return redirect(route('login'));
    }
}
