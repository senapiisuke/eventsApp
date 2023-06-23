<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            [
                'id' => 1,
                'category_name' => 'スキルアップ/資格',
            ],

            [
                'id' => 2,
                'category_name' => 'ビジネス'
            ],

            [
                'id' => 3,
                'category_name' => '社会貢献/地域活性',
            ],

            [
                'id' => 4,
                'category_name' => 'テクノロジー/サイエンス',
            ],

            [
                'id' => 5,
                'category_name' => '食/グルメ',
            ],

            [
                'id' => 6,
                'category_name' => '音楽/ライブ/フェス',
            ],

            [
                'id' => 7,
                'category_name' => 'ファッション/美容',
            ],

            [
                'id' => 8,
                'category_name' => 'ゲーム/漫画/アニメ',
            ],

            [
                'id' => 9,
                'category_name' => 'デザイン/アート',
            ],

            [
                'id' => 10,
                'category_name' => 'その他',
            ],
        ]);
    }
}
