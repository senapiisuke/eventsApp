<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        //ログイン中にログイン画面にアクセスしようとしたら、管理者ホーム画面にリダイレクトする
        if (Auth::guard('admins')->user()) {
            return redirect()->route('admin.dashboard');
        }
        //管理者ログイン画面を表示
        return view('admin.login');
    }

    //ログイン処理
    public function login(Request $request)
    {
        //認証情報を受け取る
        $credentials = $request->only(['email', 'password']);

        //管理者情報が見つかったらログイン
        if (Auth::guard('admins')->attempt($credentials)){
            //ログイン後に表示するページへリダイレクト
            return redirect()->route('admin.dashboard')->with([
                'login_msg' => 'ログインしました。',
            ]);
        }
        //ログインできなかったら元のページに戻る
        return back()->withErrors([
            'login' => ['ログインに失敗しました。入力内容を確認してください。'],
        ]);
    }

    //ログアウト処理
    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->regenerateToken();

        //ログインページにリダイレクト
        return redirect()->route('admin.login.index')->with([
            'logout_msg' => 'ログアウトしました',
        ]);
    }
}
