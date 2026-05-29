<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * 復習：テーブル名を明示的に指定（Laravelの命名規則と一致しているので省略可）
     * ここでは明示的に書いておくと理解しやすい
     */
    protected $table = 'roles';

    /**
     * 復習：mass assignment（一括代入）で許可するカラム
     * roleName は仕様書に登場する役職名（例：一般社員、経理部）
     */
    protected $fillable = [
        'roleName',
    ];

    /**
     * 復習：1つのRoleに対して複数のUserが所属（1対多）
     * 後でUserモデルからも逆リレーションを書きます
     */
    public function users()
    {
        return $this->hasMany(User::class, 'roles_id');  // 外部キー名を明示（users_idではないので注意）
    }
}