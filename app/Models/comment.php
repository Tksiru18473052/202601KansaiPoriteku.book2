<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $table = 'comments';

    protected $fillable = [
        'users_id',   // 注意：マイグレーションで 'users_id' にしたためこの名前
        'comment',
        'book_id',
        'review',     // 0〜5のおすすめ度（バリデーションは後で）
    ];
    /**
     * 復習：commentsテーブルには created_at / updated_at カラムが存在しないため、
     * Eloquentの自動タイムスタンプ機能を無効化します
     */
    public $timestamps = false;   // ←←← ここを追加（これが修正箇所）


    /**
     * 復習：コメントは必ず1人のUserに所属（多対1）
     * 外部キー名が 'users_id' なので第2引数で明示
     */
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id');
    }

    /**
     * 復習：コメントは必ず1冊の本に所属（多対1）
     */
    public function book()
    {
        return $this->belongsTo(Book::class, 'book_id');
    }
}