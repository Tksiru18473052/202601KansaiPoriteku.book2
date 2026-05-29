<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

    protected $table = 'books';

    /**
     * 復習：mass assignment（一括代入）で許可するカラム
     * image_url を追加したので、必ずここに書いておく
     * （書かないと $book->image_url = '...' が無視されて保存されない）
     */
    protected $fillable = [
        'bookname',
        'image_url',     // ← ここを追加（これが変更する唯一の場所）
        'author',        // ← 追加
        'publisher',

    ];

    /**
     * 復習：booksテーブルには created_at / updated_at カラムが存在しないため、
     * Eloquentの自動タイムスタンプ機能を無効化します
     */
    public $timestamps = false;     // ←←← ここを追加（これが修正箇所）

    /**
     * 復習：1冊の本に対して複数のコメント（1対多）
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'book_id');
    }
}