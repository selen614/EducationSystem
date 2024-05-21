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
                'article_contents' => '･･･はそのために大きい彼の写真を出したり、三段抜きの記事を掲げたりした。何でもこの記事に従えば、喪服を着た常子はふだんよりも一層にこにこしていたそうである。ある上役や同僚は無駄になった香奠を会費に復活祝賀会を開いたそうである。もっとも山井博士の･･･',
            ],
            [
                'id' => 2,
                'title' => 'sample2',
                'posted_date' => '2024-5-21',
                'article_contents' => '･･･、芳年の浮世絵を一つ一つさし示しながら、相不変低い声で、「殊に私などはこう云う版画を眺めていると、三四十年前のあの時代が、まだ昨日のような心もちがして、今でも新聞をひろげて見たら、鹿鳴館の舞踏会の記事が出ていそうな気がするのです。実を云･･･ ',
            ],
            [
                'id' => 3,
                'title' => 'sample3',
                'posted_date' => '2024-5-21',
                'article_contents' => '･･･北海道の記事を除いたすべては一つ残らず青森までの汽車の中で読み飽いたものばかりだった。「お前は今日の早田の説明で農場のことはたいてい呑みこめたか」　ややしばらくしてから父は取ってつけたようにぽっつりとこれだけ言って、はじめてまともに･･･',
            ],
            [
                'id' => 4,
                'title' => 'sample4',
                'posted_date' => '2024-5-21',
                'article_contents' => '･･･北海道の記事を除いたすべては一つ残らず青森までの汽車の中で読み飽いたものばかりだった。「お前は今日の早田の説明で農場のことはたいてい呑みこめたか」　ややしばらくしてから父は取ってつけたようにぽっつりとこれだけ言って、はじめてまともに･･･',
            ],
            [
                'id' => 5,
                'title' => 'sample5',
                'posted_date' => '2024-5-21',
                'article_contents' => '･･･北海道の記事を除いたすべては一つ残らず青森までの汽車の中で読み飽いたものばかりだった。「お前は今日の早田の説明で農場のことはたいてい呑みこめたか」　ややしばらくしてから父は取ってつけたようにぽっつりとこれだけ言って、はじめてまともに･･･',
            ],
            [
                'id' => 6,
                'title' => 'sample6',
                'posted_date' => '2024-5-21',
                'article_contents' => '･･･北海道の記事を除いたすべては一つ残らず青森までの汽車の中で読み飽いたものばかりだった。「お前は今日の早田の説明で農場のことはたいてい呑みこめたか」　ややしばらくしてから父は取ってつけたようにぽっつりとこれだけ言って、はじめてまともに･･･',
            ],
        ]);

    }
}
