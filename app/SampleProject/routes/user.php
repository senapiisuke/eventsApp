<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\LoginController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\User\ResistController;
use App\Http\Controllers\User\SearchController;

//ユーザー側処理
Route::prefix('user')->group(function () {
    //アカウント新規登録画面を表示
    Route::get('/resist', [ResistController::class, 'showResist'])->name('user.resist.show');
    //アカウント新規登録
    Route::post('/resist', [ResistController::class, 'resist'])->name('user.resist.resist');

    //ログイン画面を表示
    Route::get('/login', [LoginController::class, 'index'])->name('user.login.index');
    //ログイン処理
    Route::post('/login', [LoginController::class, 'login'])->name('user.login.login');
    //ログアウト処理
    Route::get('/logout', [LoginController::class, 'logout'])->name('user.login.logout');
});

//ログインが必要なページを指定
//Route::prefix('user')->middleware('auth.members:members')->group(function () {
    //ログイン後に遷移する画面を表示
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('user.dashboard');
    //詳細画面を表示
    Route::get('/show/{id}', [HomeController::class, 'showDetail'])->name('user.show.detail');
    //マイページを表示
    Route::get('/mypage', [HomeController::class, 'showMyPage'])->name('user.mypage');
    //検索画面を表示
    Route::get('/search', [SearchController::class, 'showSearch'])->name('user.show.search');
    //カテゴリー別検索処理
    Route::get('/searchcategory', [SearchController::class, 'searchCategory'])->name('user.search.category');
//});