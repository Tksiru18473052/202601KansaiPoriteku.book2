<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;                    // 復習：Userモデルを使う
use Illuminate\Support\Facades\Hash;   // 復習：パスワードを安全にハッシュ化

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 復習：rolesTableSeederで登録したIDを前提にしています
        // id=1 → 一般社員、id=2 → 経理部（rolesTableSeederの順番通り）

        // 一般社員ユーザー（一般社員としてログインしてテスト用）
        User::create([
            'name'      => '一般太郎',           // 名前（仕様書に沿ったわかりやすい名前）
            'password'  => Hash::make('password'), // 学習用パスワード（本番では絶対に変えてください）
            'roles_id'  => 1,                     // 一般社員（rolesテーブルのid=1）
        ]);
        User::create(['name' => '一般次郎', 'password' => Hash::make('password'), 'roles_id' => 1]);
        User::create(['name' => '一般三郎', 'password' => Hash::make('password'), 'roles_id' => 1]);
        User::create(['name' => '一般四郎', 'password' => Hash::make('password'), 'roles_id' => 1]);
        User::create(['name' => '一般五郎', 'password' => Hash::make('password'), 'roles_id' => 1]);
        User::create(['name' => '一般六郎', 'password' => Hash::make('password'), 'roles_id' => 1]);
        User::create(['name' => '一般七郎', 'password' => Hash::make('password'), 'roles_id' => 1]);
        User::create(['name' => '一般八郎', 'password' => Hash::make('password'), 'roles_id' => 1]);
        User::create(['name' => '一般九郎', 'password' => Hash::make('password'), 'roles_id' => 1]);
        User::create(['name' => '一般十郎', 'password' => Hash::make('password'), 'roles_id' => 1]);       

        // 経理部ユーザー（経理部としてログインして新規登録・削除をテスト用）
        User::create([
            'name'      => '経理花子',
            'password'  => Hash::make('password'),
            'roles_id'  => 2,                     // 経理部（rolesテーブルのid=2）
        ]);

        // 経理部ユーザー（経理部としてログインして新規登録・削除をテスト用）
        User::create([
            'name'      => '経理一郎',
            'password'  => Hash::make('pass'),
            'roles_id'  => 2,                     // 経理部（rolesテーブルのid=2）
        ]);

        // 復習：UserモデルにisAccounting()メソッドがあるので、後でログインして権限制御を確認できます
    }
}