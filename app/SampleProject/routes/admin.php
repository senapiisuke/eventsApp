<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\HomeController;

//管理者側処理
Route::prefix('admin')->group(function () {
    //ログイン画面を表示
    Route::get('/login', [LoginController::class, 'index'])->name('admin.login.index');
    //ログイン処理
    Route::post('/login', [LoginController::class, 'login'])->name('admin.login.login');
    //ログアウト処理
    Route::get('/logout', [LoginController::class, 'logout'])->name('admin.login.logout');
});

//ログインが必要なページを指定
Route::prefix('admin')->middleware('auth:admins')->group(function () {
    //ログイン後に遷移するページを表示
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('admin.dashboard');
    //新規投稿の作成画面を表示
    Route::get('/create', [HomeController::class, 'create'])->name('admin.create');
    //新規投稿をDB(informationテーブル)に登録
    Route::post('/store', [HomeController::class, 'store'])->name('admin.store');
    //新規投稿の完了画面を表示
    Route::get('/complete', [HomeController::class, 'complete'])->name('admin.complete');

    //投稿の詳細画面を表示
    Route::get('/show/{id}', [HomeController::class, 'show'])->name('admin.show');
    //投稿の編集画面を表示
    Route::get('/edit/{id}/', [HomeController::class, 'edit'])->name('admin.edit');
    //データを更新
    Route::patch('/edit/{id}', [HomeController::class, 'update'])->name('admin.update');
    //データを削除
    Route::post('/delete/{id}', [HomeController::class, 'delete'])->name('admin.delete');
});