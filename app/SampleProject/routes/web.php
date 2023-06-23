<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//ユーザー管理系・管理画面系のファイル呼び出し
include __DIR__ . '/admin.php';
include __DIR__ . '/user.php';

//Topページを表示
Route::get('/', function () {
    return view('index');
})->name('top');


