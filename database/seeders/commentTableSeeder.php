<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   // 復習：DBファサードを使うため

class commentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 復習：BookTableSeederで登録したbook_id（1〜12）に合わせてコメントを追加
        // 各書籍に2件ずつ、合計24件のコメントを作成（学習・テスト用に充実）

        // ==================== Book 1：ITパスポート ====================
        DB::table('comments')->insert([
            'users_id' => 1,                // 一般太郎（一般社員）
            'comment'  => 'ためになった',
            'book_id'  => 1,
            'review'   => 4,
        ]);
        DB::table('comments')->insert([
            'users_id' => 3,                // 一般次郎（一般社員）
            'comment'  => 'わかりやすかった',
            'book_id'  => 1,
            'review'   => 5,
        ]);

        // ==================== Book 2：基本情報技術者 ====================
        DB::table('comments')->insert([
            'users_id' => 2,                // 経理花子（経理部）
            'comment'  => '実務で役立ちそう',
            'book_id'  => 2,
            'review'   => 3,
        ]);
        DB::table('comments')->insert([
            'users_id' => 4,                // 経理一郎（経理部）
            'comment'  => '問題集と一緒に使いたい',
            'book_id'  => 2,
            'review'   => 4,
        ]);

        // ==================== Book 3：基本情報技術者【科目B】 ====================
        DB::table('comments')->insert([
            'users_id' => 1,                // 一般太郎（一般社員）
            'comment'  => 'アルゴリズムの解説が丁寧',
            'book_id'  => 3,
            'review'   => 5,
        ]);
        DB::table('comments')->insert([
            'users_id' => 3,                // 一般次郎（一般社員）
            'comment'  => '擬似言語の練習に最適',
            'book_id'  => 3,
            'review'   => 4,
        ]);

        // ==================== Book 4：情報セキュリティマネジメント ====================
        DB::table('comments')->insert([
            'users_id' => 2,                // 経理花子（経理部）
            'comment'  => 'セキュリティの基礎が学べてよかった',
            'book_id'  => 4,
            'review'   => 5,
        ]);
        DB::table('comments')->insert([
            'users_id' => 4,                // 経理一郎（経理部）
            'comment'  => '会社で活かせそうな内容',
            'book_id'  => 4,
            'review'   => 4,
        ]);

        // ==================== Book 5：スッキリわかるJava入門 ====================
        DB::table('comments')->insert([
            'users_id' => 1,                // 一般太郎
            'comment'  => 'Javaの基礎がスッキリ理解できた',
            'book_id'  => 5,
            'review'   => 5,
        ]);
        DB::table('comments')->insert([
            'users_id' => 3,                // 一般次郎
            'comment'  => '初心者におすすめ',
            'book_id'  => 5,
            'review'   => 4,
        ]);

        // ==================== Book 6：図解でやさしくわかる ネットワーク ====================
        DB::table('comments')->insert([
            'users_id' => 2,                // 経理花子
            'comment'  => '図解が多くてわかりやすい',
            'book_id'  => 6,
            'review'   => 5,
        ]);
        DB::table('comments')->insert([
            'users_id' => 4,                // 経理一郎
            'comment'  => 'ネットワークの仕組みが頭に入った',
            'book_id'  => 6,
            'review'   => 4,
        ]);

        // ==================== Book 7：新しいLinuxの教科書 ====================
        DB::table('comments')->insert([
            'users_id' => 1,                // 一般太郎
            'comment'  => 'Linuxの基礎がしっかり学べる',
            'book_id'  => 7,
            'review'   => 5,
        ]);
        DB::table('comments')->insert([
            'users_id' => 3,                // 一般次郎
            'comment'  => 'コマンド操作が身についた',
            'book_id'  => 7,
            'review'   => 4,
        ]);

        // ==================== Book 8：いきなりプログラミング JavaScript ====================
        DB::table('comments')->insert([
            'users_id' => 2,                // 経理花子
            'comment'  => 'JavaScriptの入門書として最適',
            'book_id'  => 8,
            'review'   => 5,
        ]);
        DB::table('comments')->insert([
            'users_id' => 4,                // 経理一郎
            'comment'  => 'すぐに実践できそう',
            'book_id'  => 8,
            'review'   => 4,
        ]);

        // ==================== Book 9：ロベールのC++入門講座 ====================
        DB::table('comments')->insert([
            'users_id' => 1,                // 一般太郎
            'comment'  => 'C++の基礎が丁寧に解説されている',
            'book_id'  => 9,
            'review'   => 4,
        ]);
        DB::table('comments')->insert([
            'users_id' => 3,                // 一般次郎
            'comment'  => 'プログラミング初心者でも読みやすい',
            'book_id'  => 9,
            'review'   => 5,
        ]);

        // ==================== Book 10：IT戦略の基本が全部わかる本 ====================
        DB::table('comments')->insert([
            'users_id' => 2,                // 経理花子
            'comment'  => 'IT戦略の全体像が把握できた',
            'book_id'  => 10,
            'review'   => 5,
        ]);
        DB::table('comments')->insert([
            'users_id' => 4,                // 経理一郎
            'comment'  => '実務で参考になりそう',
            'book_id'  => 10,
            'review'   => 4,
        ]);

        // ==================== Book 11：情報処理教科書 ITサービスマネージャ ====================
        DB::table('comments')->insert([
            'users_id' => 1,                // 一般太郎
            'comment'  => 'ITILの知識が体系的に学べる',
            'book_id'  => 11,
            'review'   => 4,
        ]);
        DB::table('comments')->insert([
            'users_id' => 3,                // 一般次郎
            'comment'  => '資格勉強に最適',
            'book_id'  => 11,
            'review'   => 5,
        ]);

        // ==================== Book 12：IT用語図鑑[エンジニア編] ====================
        DB::table('comments')->insert([
            'users_id' => 2,                // 経理花子
            'comment'  => 'IT用語の復習に便利',
            'book_id'  => 12,
            'review'   => 5,
        ]);
        DB::table('comments')->insert([
            'users_id' => 4,                // 経理一郎
            'comment'  => '頻出キーワードがまとまっていて良い',
            'book_id'  => 12,
            'review'   => 4,
        ]);

        // 復習：合計24件のコメントが登録されます
    }
}