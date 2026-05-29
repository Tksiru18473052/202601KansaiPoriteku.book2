<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('books', function (Blueprint $table) {
            $table->id();
            $table->string('bookname');
            // 追加：書籍の表紙画像URL（仕様書にない拡張機能）
            // string型でURLを保存。NULL許容（画像がない書籍も考慮）
            $table->string('image_url')->nullable();
            $table->string('author')->nullable();        // 著者名（NULL許可：著者不明の本も考慮）
            $table->string('publisher')->nullable();     // 出版社名（NULL許可）

            // 復習：後で在庫数なども追加したい場合はここに書けます
            // $table->integer('stock')->default(1);

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
