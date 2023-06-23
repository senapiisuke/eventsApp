<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Information;

class HomeController extends Controller
{
    //ダッシュボードを表示
    public function dashboard()
    {
        $model = new Information();
        $posts = $model->getList();

        return view('user.dashboard', ['posts' => $posts]);
    }

    //マイページを表示
    public function showMyPage()
    {
        return view('user.myPage');
    }

    //投稿の詳細を表示
    public function showDetail($id)
    {
        $post = Information::find($id);

        return view('user.show', compact('post'));
    }
}
