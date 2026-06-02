<?php

namespace App\Http\Controllers\topBooks;
use Illuminate\Http\Request;
use App\Models\Book;
use App\Http\Controllers\Controller;

class BookController extends Controller
{
/**
     * 一般社員用の書籍一覧表示（検索＋自動方向決定の並び替え）
     */
    public function general(Request $request)
    {
        $query = Book::withCount('comments')
                     ->withAvg('comments', 'review');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function($q) use ($keyword) {
                $q->where('bookname', 'like', '%' . $keyword . '%')
                  ->orWhere('author', 'like', '%' . $keyword . '%')
                  ->orWhere('publisher', 'like', '%' . $keyword . '%');
            });
        }

        $sort = $request->get('sort', 'id');

        // 自動で最適な方向を決定
        if ($sort === 'bookname' || $sort === 'author' || $sort === 'publisher') {
            $direction = 'asc';   // 名前系は昇順（あいうえお順）
        } else {
            $direction = 'desc';  // 新着順・平均評価・評価件数 は降順
        }

        if ($sort === 'bookname') {
            $query->orderBy('bookname', $direction);
        } elseif ($sort === 'author') {
            $query->orderBy('author', $direction);
        } elseif ($sort === 'publisher') {
            $query->orderBy('publisher', $direction);
        } elseif ($sort === 'avg_review') {
            $query->orderBy('comments_avg_review', $direction);
        } elseif ($sort === 'review_count') {
            $query->orderBy('comments_count', $direction);
        } else {
            $query->orderBy('id', $direction);
        }

        $books = $query->get();

        return view('topbook.general', compact('books'));
    }

    /**
     * 経理部社員用の書籍一覧表示（検索＋自動方向決定の並び替え）
     */
    public function accounting(Request $request)
    {
        $query = Book::withCount('comments')
                     ->withAvg('comments', 'review');

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');
            $query->where(function($q) use ($keyword) {
                $q->where('bookname', 'like', '%' . $keyword . '%')
                  ->orWhere('author', 'like', '%' . $keyword . '%')
                  ->orWhere('publisher', 'like', '%' . $keyword . '%');
            });
        }

        $sort = $request->get('sort', 'id');

        if ($sort === 'bookname' || $sort === 'author' || $sort === 'publisher') {
            $direction = 'asc';
        } else {
            $direction = 'desc';
        }

        if ($sort === 'bookname') {
            $query->orderBy('bookname', $direction);
        } elseif ($sort === 'author') {
            $query->orderBy('author', $direction);
        } elseif ($sort === 'publisher') {
            $query->orderBy('publisher', $direction);
        } elseif ($sort === 'avg_review') {
            $query->orderBy('comments_avg_review', $direction);
        } elseif ($sort === 'review_count') {
            $query->orderBy('comments_count', $direction);
        } else {
            $query->orderBy('id', $direction);
        }

        $books = $query->get();

        return view('topbook.accounting', compact('books'));
    }
    public function show($id)
    {
        $book = Book::with('comments.user')   // コメントと投稿者情報も取得
                    ->findOrFail($id);

        // ★★★ レビューの分布を計算 ★★★
        $reviewDistribution = $book->comments()
            ->selectRaw('review, COUNT(*) as count')
            ->groupBy('review')
            ->orderBy('review', 'desc')
            ->pluck('count', 'review')
            ->toArray();

        // 0〜5の星がすべて存在するように初期化
        for ($i = 5; $i >= 1; $i--) {
            $reviewDistribution[$i] = $reviewDistribution[$i] ?? 0;
        }

        return view('comment.show', compact('book', 'reviewDistribution'));
    }

    /**
     * 削除画面を表示（経理部社員専用・検索対応）
     */
    public function deleteIndex(Request $request)
    {
        // 一般社員はアクセス不可
        if (!auth()->user()->isAccounting()) {
            return redirect()->route('books.general')
                             ->with('error', 'このページは経理部社員のみ利用可能です。');
        }

        $query = Book::query();

        if ($request->filled('keyword')) {
            $keyword = $request->input('keyword');

            $query->where(function($q) use ($keyword) {
                $q->where('bookname', 'like', '%' . $keyword . '%')
                  ->orWhere('author', 'like', '%' . $keyword . '%')
                  ->orWhere('publisher', 'like', '%' . $keyword . '%');
            });
        }

        $books = $query->orderBy('id', 'asc')->get();

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