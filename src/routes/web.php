<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthController;


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

// index.blade.php (フォーム表示)
Route::get('/', [ContactController::class, 'index']);

// confirm.blade.php (確認画面へ)
Route::post('contacts/confirm', [ContactController::class, 'confirm']);

// store処理 (DB保存) とリダイレクト
Route::post('/contacts', [ContactController::class, 'store']);

Route::get('/categories', [CategoryController::class, 'index']);
Route::post('/categories', [CategoryController::class, 'store']);

Route::middleware('auth')->group(function () {
    Route::get('/register', [AuthController::class, 'index']);
});
