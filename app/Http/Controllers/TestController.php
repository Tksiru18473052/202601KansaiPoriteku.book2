<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class TestController extends Controller
{
    /**
     * テスト用確認ページ
     */
    public function index()
    {
        $user = Auth::user();
        $booksCount = Book::count();
        $commentsCount = Comment::count();
        $books = Book::with('comments')->take(10)->get();

        return view('test', compact('user', 'booksCount', 'commentsCount', 'books'));
    }

    /**
     * ISBN検索テストページ
     */
    public function isbn()
    {
        return view('test.isbn');
    }
}