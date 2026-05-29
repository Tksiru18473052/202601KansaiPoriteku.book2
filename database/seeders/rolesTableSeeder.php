<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;   // 修正：book → DB（DBファサードを使うため）

class rolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('roles')->insert([     // 修正：articles → roles（マイグレーションで作ったテーブル名）
            'roleName' => '一般社員'
        ]);
        DB::table('roles')->insert([
            'roleName' => '経理部'
        ]);
    }
}