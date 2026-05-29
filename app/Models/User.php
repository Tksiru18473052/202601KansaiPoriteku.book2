<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'users';   // 復習：テーブル名が 'users' であることを明示

    protected $fillable = [
        'name',
        'password',
        'roles_id',           // 追加：roles_id を一括代入許可
    ];

    protected $hidden = [
        'password',
        // 'remember_token',  // 必要なら後で追加
    ];

    /**
     * 復習：1人のUserは1つのRoleに所属（多対1）
     * 外部キー名が 'roles_id' なので明示
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'roles_id');
    }

    /**
     * 復習：1人のUserは複数のコメントを書ける（1対多）
     * commentsテーブルの users_id を参照
     */
    public function comments()
    {
        return $this->hasMany(Comment::class, 'users_id');
    }

    /**
     * 仕様書で最も重要なメソッド（経理部社員かどうかの判定）
     * rolesテーブルに '経理部' などの roleName が入っている前提
     * 
     * @return bool
     */
    public function isAccounting(): bool
    {
        return $this->role && $this->role->roleName === '経理部';  // 必要に応じて文字列を調整
    }

    /**
     * 一般社員かどうかの判定（isAccountingの逆）
     */
    public function isGeneralEmployee(): bool
    {
        return !$this->isAccounting();
    }

    public $timestamps = false;

    


}