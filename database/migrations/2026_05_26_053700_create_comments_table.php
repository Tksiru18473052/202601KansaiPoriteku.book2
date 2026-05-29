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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');   // 修正：user_Id → user_id（snake_case）
            $table->string('comment');
            $table->unsignedBigInteger('book_id');   // 修正：books_Id → book_id（snake_case）
            $table->integer('review');               // 0〜5の範囲は後でバリデーションで制御

            // 復習：外部キー制約は必ずクロージャの中で定義する
            $table->foreign('users_id')->references('id')->on('users');
            $table->foreign('book_id')->references('id')->on('books');

            // 学習ポイント：timestamps() を追加すると created_at / updated_at が自動管理される
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};