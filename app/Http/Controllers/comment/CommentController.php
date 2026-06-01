<?php

namespace App\Http\Controllers\comment;   // ← ここを comment に変更

use Illuminate\Http\Request;
use App\Models\Comment;
use Illuminate\Support\Facades\Auth;

class CommentController extends \App\Http\Controllers\Controller   // 親クラスを明示
{
    public function store(Request $request)
    {
        $request->validate([
            'book_id' => 'required|exists:books,id',
            'comment' => 'required|string|max:500',
            'review'  => 'required|integer|between:0,5',
        ]);

        Comment::create([
            'users_id' => Auth::id(),           // 現在ログイン中のユーザーID
            'book_id'  => $request->book_id,
            'comment'  => $request->comment,
            'review'   => $request->review,
        ]);

        return redirect()->route('books.show', $request->book_id)
        ->with('success', 'コメントを投稿しました！');
    }

    /**
     * コメント削除（自分のコメント or 経理部社員なら全コメント削除可）
     */
    public function destroy(Comment $comment)
    {
        // 復習：自分のコメントか、経理部社員なら削除可能
        if ($comment->users_id === Auth::id() || Auth::user()->isAccounting()) {
            $comment->delete();
            return redirect()->route('books.show', $comment->book_id)
            ->with('success', 'コメントを削除しました。');
        }

        // 権限がない場合はエラー
        return redirect()->route('books.show', $comment->book_id)
        ->with('error', 'このコメントを削除する権限がありません。');
    }

    /**
     * コメント編集画面を表示（自分のコメントのみ）
     */
    public function edit(Comment $comment)
    {
        // 自分のコメント以外は編集不可
        if ($comment->users_id !== auth()->id()) {
            return redirect()->route('books.show', $comment->book_id)
                             ->with('error', '自分のコメントのみ編集可能です。');
        }

        return view('comment.edit', compact('comment'));
    }

    /**
     * コメント更新処理
     */
    public function update(Request $request, Comment $comment)
    {
        // 自分のコメント以外は更新不可
        if ($comment->users_id !== auth()->id()) {
            return redirect()->route('books.show', $comment->book_id)
                             ->with('error', '自分のコメントのみ編集可能です。');
        }

        $request->validate([
            'comment' => 'required|string|max:500',
            'review'  => 'required|integer|between:0,5',
        ]);

        $comment->update([
            'comment' => $request->comment,
            'review'  => $request->review,
        ]);

        return redirect()->route('books.show', $comment->book_id)
                         ->with('success', 'コメントを更新しました！');
    }

    



}