<?php

use Illuminate\Support\Facades\Route;

// 使用するコントローラー
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\topBooks\BookController;
use App\Http\Controllers\comment\CommentController;
use App\Http\Controllers\RegistrationController;

/*
|--------------------------------------------------------------------------
| 公開ルート
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

// ログイン関連
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

/*
|--------------------------------------------------------------------------
| ログイン必須ルート
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // 書籍一覧
    Route::get('/books/general', [BookController::class, 'general'])->name('books.general');
    Route::get('/books/accounting', [BookController::class, 'accounting'])->name('books.accounting');

    // 書籍詳細 + コメント
    Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');
    Route::post('/comments', [CommentController::class, 'store']);
    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');

    // 書籍削除
    Route::get('/books/delete', [BookController::class, 'deleteIndex'])->name('books.delete');
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy');

    // ==================== 書籍登録 ====================
    // 登録フォーム表示
    Route::get('/bookRegistration', [RegistrationController::class, 'create'])
         ->name('book.registration');

    // 登録処理（ここが「登録する」ボタンで呼ばれるルート）
    Route::post('/bookRegistration', [RegistrationController::class, 'store'])
         ->name('book.store');

    // 登録完了画面
    Route::get('/registrationConfirm', [RegistrationController::class, 'confirm'])
         ->name('book.confirm');
});