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
// ==================== Book 1：ITパスポート（10件） ====================
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => 'ためになった', 'book_id' => 1, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => 'わかりやすかった', 'book_id' => 1, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => 'ITパスポートの基礎がしっかり学べた', 'book_id' => 1, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '初心者におすすめの一冊です', 'book_id' => 1, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => '問題集と一緒に使うと効果的', 'book_id' => 1, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => '用語の解説が丁寧でわかりやすい', 'book_id' => 1, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '試験対策に最適', 'book_id' => 1, 'review' => 3 ]); // 普通
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => '全体的に読みやすかった', 'book_id' => 1, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => '復習にちょうど良い', 'book_id' => 1, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => '少し難しい部分もあった', 'book_id' => 1, 'review' => 3 ]); // 普通

        // ==================== Book 2：基本情報技術者（10件） ====================
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => '実務で役立ちそう', 'book_id' => 2, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => '問題集と一緒に使いたい', 'book_id' => 2, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => '基礎がしっかり固められる', 'book_id' => 2, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => 'わかりやすい解説が多い', 'book_id' => 2, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => '試験勉強に最適', 'book_id' => 2, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '少し物足りない部分もあった', 'book_id' => 2, 'review' => 3 ]); // 普通
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '理論と実践のバランスが良い', 'book_id' => 2, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => '読みやすい', 'book_id' => 2, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => '初心者には少し難しい', 'book_id' => 2, 'review' => 2 ]); // 低評価
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => 'モチベーションが上がる', 'book_id' => 2, 'review' => 5 ]);

        // ==================== Book 3〜12：それぞれ10件ずつ、自然な分布 ====================
        // Book 3：基本情報技術者【科目B】
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => 'アルゴリズムの解説が丁寧', 'book_id' => 3, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => '擬似言語の練習に最適', 'book_id' => 3, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => '科目Bの苦手克服にぴったり', 'book_id' => 3, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '例題が豊富で実践的', 'book_id' => 3, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => '少し難しかった', 'book_id' => 3, 'review' => 3 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => '試験対策として優秀', 'book_id' => 3, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '論理的思考力が鍛えられる', 'book_id' => 3, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => '復習に最適', 'book_id' => 3, 'review' => 3 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => '難易度がちょうど良い', 'book_id' => 3, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => '科目Bが苦手だったけど理解できた', 'book_id' => 3, 'review' => 5 ]);

        // Book 4〜12も同じように10件ずつ、自然な分布で追加（省略せず記載）
        // Book 4：情報セキュリティマネジメント
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => 'セキュリティの基礎が学べてよかった', 'book_id' => 4, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => '会社で活かせそうな内容', 'book_id' => 4, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => '実務に直結する知識が多い', 'book_id' => 4, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => '初心者でも読みやすい', 'book_id' => 4, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => '少し専門的すぎた', 'book_id' => 4, 'review' => 3 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '試験対策に最適', 'book_id' => 4, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '初心者には少し難しい', 'book_id' => 4, 'review' => 2 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => 'セキュリティ意識が高まった', 'book_id' => 4, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => '日常業務で役立つ', 'book_id' => 4, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => 'もう少し簡単な説明が欲しかった', 'book_id' => 4, 'review' => 2 ]);

// ==================== Book 5：スッキリわかるJava入門 ====================
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => 'Javaの基礎がスッキリ理解できた', 'book_id' => 5, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => '初心者におすすめ', 'book_id' => 5, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => '初心者には少し難しい', 'book_id' => 5, 'review' => 2 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '例題が多くて実践的', 'book_id' => 5, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => 'Javaの楽しさがわかった', 'book_id' => 5, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => 'プログラミングの第一歩に最適', 'book_id' => 5, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '復習用にも使える', 'book_id' => 5, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => 'もう少し簡単な説明が欲しかった', 'book_id' => 4, 'review' => 2 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => '少し難しい部分もあった', 'book_id' => 5, 'review' => 3 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => 'Java入門書として最高', 'book_id' => 5, 'review' => 5 ]);

        // ==================== Book 6：図解でやさしくわかる ネットワーク ====================
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => '図解が多くてわかりやすい', 'book_id' => 6, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => 'ネットワークの仕組みが頭に入った', 'book_id' => 6, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => '視覚的に理解しやすい', 'book_id' => 6, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => '基礎から学べて良い', 'book_id' => 6, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => '実務で役立つ内容', 'book_id' => 6, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '図が豊富で記憶に残る', 'book_id' => 6, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => 'ネットワーク初心者におすすめ', 'book_id' => 6, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => '初心者には少し難しい', 'book_id' => 6, 'review' => 2 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => 'もう少し詳しい説明が欲しかった', 'book_id' => 6, 'review' => 3 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => '興味が湧いた', 'book_id' => 6, 'review' => 5 ]);

        // ==================== Book 7：新しいLinuxの教科書 ====================
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => 'Linuxの基礎がしっかり学べる', 'book_id' => 7, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => 'コマンド操作が身についた', 'book_id' => 7, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => '実践的な内容が多い', 'book_id' => 7, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '意味不明', 'book_id' => 7, 'review' => 1 ]);
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => 'わかりやすい説明', 'book_id' => 7, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => 'サーバー管理の基礎がわかる', 'book_id' => 7, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => 'コマンドの意味が深く理解できた', 'book_id' => 7, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => '復習に使える', 'book_id' => 7, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => 'Linuxが好きになった', 'book_id' => 7, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => '初心者向けで読みやすい', 'book_id' => 7, 'review' => 4 ]);

        // ==================== Book 8：いきなりプログラミング JavaScript ====================
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => 'JavaScriptの入門書として最適', 'book_id' => 8, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => 'すぐに実践できそう', 'book_id' => 8, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => 'JavaScriptの楽しさがわかった', 'book_id' => 8, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => 'コード例が豊富', 'book_id' => 8, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => 'Web制作の第一歩に', 'book_id' => 8, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '初心者でも挫折しにくい', 'book_id' => 8, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '意味不明', 'book_id' => 8, 'review' => 1 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => 'モチベーションが上がる', 'book_id' => 8, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => 'JavaScriptの基礎固めに', 'book_id' => 8, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => 'おすすめの入門書', 'book_id' => 8, 'review' => 5 ]);

        // ==================== Book 9：ロベールのC++入門講座 ====================
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => 'C++の基礎が丁寧に解説されている', 'book_id' => 9, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => 'プログラミング初心者でも読みやすい', 'book_id' => 9, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => '例題が多くて実践的', 'book_id' => 9, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => 'なにこれ？', 'book_id' => 9, 'review' => 1 ]);
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => '丁寧な説明が良い', 'book_id' => 9, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => 'C++入門に最適', 'book_id' => 9, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '復習に使える', 'book_id' => 9, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => '基礎からしっかり学べる', 'book_id' => 9, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => 'コードが読みやすい', 'book_id' => 9, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => 'C++の楽しさがわかった', 'book_id' => 9, 'review' => 5 ]);

        // ==================== Book 10：IT戦略の基本が全部わかる本 ====================
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => 'IT戦略の全体像が把握できた', 'book_id' => 10, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => '実務で参考になりそう', 'book_id' => 10, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => '経営視点が学べた', 'book_id' => 10, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => 'ITとビジネスのつながりがわかる', 'book_id' => 10, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => '戦略立案の考え方が身についた', 'book_id' => 10, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => '読みやすい', 'book_id' => 10, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => 'プロジェクト管理に役立つ', 'book_id' => 10, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => 'IT担当者必読', 'book_id' => 10, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => 'バカ丸出しですね', 'book_id' => 10, 'review' => 1 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => '実務に直結する内容', 'book_id' => 10, 'review' => 5 ]);

        // ==================== Book 11：情報処理教科書 ITサービスマネージャ ====================
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => 'ITILの知識が体系的に学べる', 'book_id' => 11, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => '資格勉強に最適', 'book_id' => 11, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => 'サービスマネジメントの基礎がわかる', 'book_id' => 11, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => 'ふつーーー', 'book_id' => 11, 'review' => 2 ]);
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => 'ITサービス管理の全体像', 'book_id' => 11, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => '試験対策に良い', 'book_id' => 11, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '事例が豊富', 'book_id' => 11, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => 'マネジメント視点が学べた', 'book_id' => 11, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => '読みやすい教科書', 'book_id' => 11, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => 'ITサービスマネージャの基礎固め', 'book_id' => 11, 'review' => 5 ]);

        // ==================== Book 12：IT用語図鑑[エンジニア編] ====================
        DB::table('comments')->insert([ 'users_id' => 2, 'comment' => 'IT用語の復習に便利', 'book_id' => 12, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 4, 'comment' => '頻出キーワードがまとまっていて良い', 'book_id' => 12, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 1, 'comment' => '用語の意味が一目でわかる', 'book_id' => 12, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 3, 'comment' => 'エンジニア必須の用語集', 'book_id' => 12, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 5, 'comment' => '辞書のように使える', 'book_id' => 12, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 7, 'comment' => 'ふつーーー', 'book_id' => 12, 'review' => 2 ]);
        DB::table('comments')->insert([ 'users_id' => 6, 'comment' => '図解がわかりやすい', 'book_id' => 12, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 8, 'comment' => '日常業務で役立つ', 'book_id' => 12, 'review' => 4 ]);
        DB::table('comments')->insert([ 'users_id' => 9, 'comment' => '用語の幅が広い', 'book_id' => 12, 'review' => 5 ]);
        DB::table('comments')->insert([ 'users_id' => 10, 'comment' => 'IT用語のバイブル', 'book_id' => 12, 'review' => 5 ]);

        // 復習：合計120件のコメントが登録されます
    }
}