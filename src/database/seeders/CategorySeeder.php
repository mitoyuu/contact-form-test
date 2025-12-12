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
        $contents = [
            '1.商品のお届けについて',
            '2.商品の交換について',
            '3.商品トラブル',
            '4.ショップへのお問い合わせ',
            '5.その他',
        ];

        foreach ($contents as $content) {
            DB::table('categories')->insert(['content' => $content]);
        }
    }
}
