<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('articles')->insert([
            [
                'id' => 1,
                'title' => 'sample1',
                'posted_date' => '2024-5-21',
                'article_contents' => 'テキストテキスト',
            ],
            [
                'id' => 2,
                'title' => 'タイトルタイトルタイトルタイトルタイトルタイトルタイトルタイトル長いタイトル',
                'posted_date' => '2024-5-21',
                'article_contents' => 'テキストテキスト',
            ],
            [
                'id' => 3,
                'title' => 'sample3',
                'posted_date' => '2024-5-23',
                'article_contents' => 'テキストテキスト',
            ],
            [
                'id' => 4,
                'title' => 'sample4',
                'posted_date' => '2024-5-23',
                'article_contents' => 'テキストテキスト',
            ],
            [
                'id' => 5,
                'title' => 'sample5',
                'posted_date' => '2024-5-24',
                'article_contents' => 'テキストテキスト',
            ],
            [
                'id' => 6,
                'title' => 'sample6',
                'posted_date' => '2024-5-25',
                'article_contents' => 'テキストテキスト',
            ],
        ]);

    }
}
