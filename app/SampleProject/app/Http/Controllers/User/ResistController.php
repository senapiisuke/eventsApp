<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class ResistController extends Controller
{
    //新規ユーザー登録画面を表示
    public function showResist()
    {
        return view('user.resist');
    }

    //新規ユーザー登録処理
    public function resist(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->name;
        $user->kana = $request->kana;
        $user->tell = $request->tell;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect()->route('user.login.index');
    }
}
