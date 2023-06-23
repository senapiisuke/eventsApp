<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Information;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    //ダッシュボードを表示
    public function dashboard()
    {
        $model = new Information();
        $posts = $model->getList();

        return view('admin.dashboard', ['posts' => $posts]);
    }

    //新規投稿作成画面を表示
    public function create()
    {
        return view('admin.create');
    }

    //入力内容をinformationテーブルに保存
    public function store(PostRequest $request)
    {
        //登録処理
        $post = new Information();
        $post->id = $request->id;
        $post->group_id = $request->group_id;
        $post->title = $request->title;
        $post->category = $request->category;
        $post->date = $request->date;
        $post->entry_fee = $request->entry_fee;
        $post->content = $request->content;

        if(request('image_url')){
            $original=request()->file('image_url')->getClientOriginalName();
            $name=date('Ymd_His').'_'.$original;
            request()->file('image_url')->move('storage/image_url', $name);
            $post->image_url=$name;
        }

        $post->save();
        return redirect()->route('admin.complete');
    }

    //新規投稿完了画面を表示
    public function complete()
    {
        return view('admin.complete');
    }

    //投稿詳細画面を表示
    public function show($id)
    {
        $post = Information::find($id);

        return view('admin.show', compact('post'));
    }

    //選択した投稿の編集画面を表示
    public function edit($id)
    {
        $post = Information::find($id);

        return view('admin.edit', compact('post'));
    }

    //DB更新
    public function update(PostRequest $request, Information $post)
    {
         $post->group_id = $request->group_id;
         $post->title = $request->title;
         $post->category = $request->category;
         $post->date = $request->date;
         $post->entry_fee = $request->entry_fee;
         $post->content = $request->content;

         if(request('image_url')){
             $original=request()->file('image_url')->getClientOriginalName();
             $name=date('Ymd_His').'_'.$original;
             request()->file('image_url')->move('storage/image_url', $name);
             $post->image_url=$name;
         }

         $post->save();
         return redirect()->route("admin.dashboard");
    }


    //DB削除
    public function delete($id)
    {
        $post = Information::find($id);
        $post->delete();
        return redirect(route('admin.dashboard'))->with('success', '登録内容を削除しました');
    }

}