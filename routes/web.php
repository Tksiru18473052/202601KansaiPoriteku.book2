<?php

use Illuminate\Support\Facades\Route;

// コントローラーのuse宣言（使うクラスをここで宣言）
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\topBooks\BookController;
use App\Http\Controllers\comment\CommentController;
use App\Http\Controllers\RegistrationController;

// ==============================================
// 1. 公開ルート（ログインしていなくてもアクセス可能）
// ==============================================

// トップページ（http://127.0.0.1:8000/）にアクセスしたらログイン画面に飛ばす
Route::get('/', function () {
    return redirect()->route('login');
});

// ログイン関連ルート
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');


// ==============================================
// 2. ログイン必須ルート（authミドルウェアで保護）
// ==============================================

Route::middleware('auth')->group(function () {   // ← この中にあるルートはすべて「ログイン必須」になる

    // ==================== 書籍一覧 ====================
    Route::get('/books/general', [BookController::class, 'general'])
         ->name('books.general');   // 一般社員用一覧

    Route::get('/books/accounting', [BookController::class, 'accounting'])
         ->name('books.accounting'); // 経理部社員用一覧

    // ==================== 書籍削除 ====================
    Route::get('/books/delete', [BookController::class, 'deleteIndex'])
         ->name('books.delete');     // 削除画面表示

    Route::delete('/books/{book}', [BookController::class, 'destroy'])
         ->name('books.destroy');    // 実際の削除処理

    // ==================== 書籍詳細 + コメント ====================
    Route::get('/books/{id}', [BookController::class, 'show'])
         ->name('books.show');       // 書籍詳細画面（コメントも表示）

    Route::post('/comments', [CommentController::class, 'store']);           // コメント投稿

    Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
         ->name('comments.destroy'); // コメント削除

// ==================== 書籍登録 ====================
    // 登録フォーム表示（GET）
    Route::get('/bookRegistration', [RegistrationController::class, 'create'])
         ->name('book.registration');

    // 登録処理（POST）← 「この内容で登録する」ボタンで呼ばれるルート
    Route::post('/bookRegistration', [RegistrationController::class, 'store'])
         ->name('book.store');


// 登録完了画面
Route::get('/registrationConfirm', [RegistrationController::class, 'confirm'])
     ->name('registration.confirm');

});



// ==============================================
// テスト用ルート（開発中だけ使う）
// ==============================================
// Route::middleware('auth')->get('/test', [TestController::class, 'index'])->name('test');

