<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BookTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('books')->insert([
            'bookname' => '【令和８年度】 いちばんやさしい ITパスポート 絶対合格の教科書＋出る順問題集',
            'image_url' =>'/images/books/ITpass.jpg',
            'author'     => '高橋 京介',
            'publisher'  => 'SBクリエイティブ',
        ]);

        DB::table('books')->insert([
            'bookname' => '【令和８年度】 いちばんやさしい 基本情報技術者 絶対合格の教科書＋出る順問題集',
            'image_url' =>'/images/books/kihonA.jpg',
            'author'     => '高橋 京介',
            'publisher'  => 'SBクリエイティブ',
        ]);



        DB::table('books')->insert([
            'bookname' => '［改訂新版］基本情報技術者【科目B】アルゴリズム×擬似言語トレーニングブック',
            'image_url' =>'/images/books/kihonB.jpg',
            'author'     => '大滝 みや子',
            'publisher'  => '技術評論社',
        ]);
        
        DB::table('books')->insert([
            'bookname' => '令和08年 情報セキュリティマネジメント 合格教本',
            'image_url' =>'/images/books/jouhousecyu.jpg',
            'author'     => '岡嶋 裕史',
            'publisher'  => '技術評論社',
        ]);

        DB::table('books')->insert([
            'bookname' => 'スッキリわかるJava入門 第4版 (スッキリわかる入門シリーズ)',
            'image_url' =>'/images/books/71lpxmlmu4L._SL1500_.jpg',
            'author'     => '中山 清喬,国本 大悟',
            'publisher'  => 'インプレス',
        ]);

        DB::table('books')->insert([
            'bookname' => '図解でやさしくわかる ネットワークのしくみ超入門',
            'image_url' =>'/images/books/81mWdQ3Zg5L._SL1500_.jpg',
            'author'     => '網野 衛二',
            'publisher'  => '技術評論社',
        ]);

        DB::table('books')->insert([
            'bookname' => '新しいLinuxの教科書 第２版',
            'image_url' =>'/images/books/81XM3Qf8E4L._SL1500_.jpg',
            'author'     => '三宅 英明',
            'publisher'  => 'SBクリエイティブ',
        ]);

        DB::table('books')->insert([
            'bookname' => 'いきなりプログラミング JavaScript',
            'image_url' =>'/images/books/81Nf7VSjcdL._SL1500_.jpg',
            'author'     => '高岡 佑輔',
            'publisher'  => '翔泳社',
        ]);

        DB::table('books')->insert([
            'bookname' => 'ロベールのC++入門講座',
            'image_url' =>'/images/books/61l3e6gsTEL._SL1030_.jpg',
            'author'     => 'ロベール',
            'publisher'  => '毎日コミュニケーションズ',
        ]);

        DB::table('books')->insert([
            'bookname' => 'IT戦略の基本が全部わかる本 プロジェクト計画から投資対効果・人材採用・要件定義・マネジメント・事業成長まで',
            'image_url' =>'/images/books/71Ilx1RViAL._SL1500_.jpg',
            'author'     => '橋本 将功',
            'publisher'  => '翔泳社',
        ]);

        DB::table('books')->insert([
            'bookname' => '情報処理教科書 ITサービスマネージャ（ITサービスマネージャ試験 テキスト 重要過去問 問題集） (EXAMPRESS)',
            'image_url' =>'/images/books/81g82yIymoL._SL1500_.jpg',
            'author'     => '金子 則彦',
            'publisher'  => '翔泳社',
        ]);


        DB::table('books')->insert([
            'bookname' => 'IT用語図鑑[エンジニア編] 開発・Web制作で知っておきたい頻出キーワード256',
            'image_url' =>'/images/books/91arGh3WzBL._SL1500_.jpg',
            'author'     => '増井 敏克',
            'publisher'  => '翔泳社',
        ]);

        

        


        
        
    }
}