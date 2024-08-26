<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BlogSeeder extends Seeder
{

    public function run(): void
    {
        DB::table('blogs')->insert([
            [
               'blog_title'=>'Blog Titleph 01',
               'blog_file'=>'00011122xdddds',
                'blog_slug'=>" blog ozetleri",
               'blog_sort'=>1,
               'blog_status'=>1,
               'blog_content'=>" Lorem İpsum come amed"

            ],
            [
                'blog_title'=>'Blog Titleph 02',
                'blog_file'=>'aadfwevfaff',
                'blog_sort'=>1,
                'blog_status'=>1,
                'blog_content'=>" Lorem İpsum come amed",
                'blog_slug'=>" blog ozetleri"
            ]
        ]);
    }
}
// for add --> php artisan db:seed --class=BlogSeeder
