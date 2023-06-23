<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //ログイン画面を表示
    public function index()
    {
        return view('user.login');
    }

    //ログイン処理
    public function login(Request $request)
    {
        $credentials = $request->only(['email', 'password']);

        if (Auth::guard('members')->attempt($credentials)) {
            return redirect()->route('user.dashboard')->with([
              'login_msg' => 'ログインしました。',
            ]);
        }

        return back()->withErrors([
            'login' => ['ログインに失敗しました。入力内容を確認してください。'],
        ]);
    }

    //ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('members')->logout();
        $request->session()->regenerateToken();

        return redirect()->route('user.login.index')->with([
        'auth' => ['ログアウトしました'],
    ]);
    }
}