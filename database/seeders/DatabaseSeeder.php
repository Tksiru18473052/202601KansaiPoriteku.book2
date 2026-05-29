<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

    //    User::factory()->create([
    //        'name' => 'Test User',
   //         'email' => 'test@example.com',
    //    ]);

        // 復習：外部キー（roles_id）があるテーブルは、参照先（roles）を先にシード
        $this->call(rolesTableSeeder::class);

        // 修正：ファイル名に合わせて UserTableSeeder を呼び出す
        $this->call(UserTableSeeder::class);   // ← ここを UserTableSeeder に修正

        $this->call(BookTableSeeder::class);      // ← 追加（commentsのbook_idが必要）
        $this->call(commentTableSeeder::class);   // ← 追加

    }
}