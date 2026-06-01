<?php

namespace App\Http\Controllers\topBooks;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
    /**
     * 一般社員用の書籍一覧表示
     */
    public function general(Request $request) // 1. 引数に $request を追加
    {
        // 2. 検索用のクエリを準備
        $query = Book::query();

        // 3. 検索キーワードが入力されている場合、条件を追加
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');

            $query->where(function($q) use ($keyword) {
                $q->where('bookname', 'like', '%' . $keyword . '%')
                ->orWhere('author', 'like', '%' . $keyword . '%');
            });
        }

        // 4. ID順に並び替えてデータを取得
        $books = $query->orderBy('id', 'asc')
            ->paginate(16)
            ->appends($request->query());

        // general.blade.phpへ渡す
        return view('topbook.general', compact('books'));
    }

    /**
     * 経理部社員用の書籍一覧表示
     */
    public function accounting(Request $request) // 1. 引数に $request を追加
    {
        // 2. 検索用のクエリを準備
        $query = Book::query();

        // 3. 検索キーワードが入力されている場合、条件を追加
        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');

            $query->where(function($q) use ($keyword) {
                $q->where('bookname', 'like', '%' . $keyword . '%')
                ->orWhere('author', 'like', '%' . $keyword . '%');
            });
        }

        // 4. ID順に並び替えてデータを取得
        $books = $query->orderBy('id', 'asc')
            ->paginate(16)
            ->appends($request->query());

        // accounting.blade.phpへ渡す
        return view('topbook.accounting', compact('books'));
    }
//コメントのshowメソッド
        public function show($id)
        {
             $book = Book::with('comments.user')   // 復習：コメントと投稿者情報も一緒に取得
                ->findOrFail($id);

            return view('comment.show', compact('book'));
        }

        /**
     * 削除画面を表示（経理部社員専用）
     */
    public function deleteIndex()
    {

        if (!auth()->user()->isAccounting()) {
            return redirect()->route('books.general')
->with('error', 'このページは経理部社員のみ利用可能です。');
        }
        $books = Book::all();
        return view('topbook.delete', compact('books'));
    }

    /**
     * 書籍の削除処理
     */
    public function destroy(Book $book)
    {

    if (!auth()->user()->isAccounting()) {
            return redirect()->route('books.general')
->with('error', 'このページは経理部社員のみ利用可能です。');
        }
        // 復習：外部キー制約を回避するため、関連するコメントを先に削除
        $book->comments()->delete();   // コメントを全削除
        $book->delete();

        return redirect()->route('books.delete')
        ->with('success', '書籍を削除しました：' . $book->bookname);
    }
}