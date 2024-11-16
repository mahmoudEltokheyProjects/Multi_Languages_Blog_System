<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    public function run()
    {
        // ============= Disable foreign key checks =============
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // ============= Truncate dependent table first =============
        DB::table('posts')->truncate();
        // ============= Enable foreign key checks =============
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // ============= posts table =============
        // insert the settings table
        DB::table('posts')->insert([
            // ========== post 1 ==========
            [
                'image' => 'images/post1.png',
                'category_id' => 1,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            // ========== post 2 ==========
            [
                'image' => 'images/post2.jpg',
                'category_id' => 2,
                'user_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // ============= Truncate dependent table first =============
        DB::table('post_translations')->truncate();
        // ============= post_translations table =============
        DB::table('post_translations')->insert([
            // ========== post 1 : en ==========
            [
                'post_id' => 1,
                'locale' => 'en',
                'title' => 'The First Post',
                'content' => 'This is the content of the first post.',
                'smallDesc' => 'Intro to the first post.',
            ],
            // ========== post 1 : ar ==========
            [
                'post_id' => 1,
                'locale' => 'ar',
                'title' => 'البوست الاول',
                'content' => 'البوست الاول بوصف كامل.',
                'smallDesc' => 'البوست الاول بوصف مختصر.',
            ],
            // ========== post 2 : en ==========
            [
                'post_id' => 2,
                'locale' => 'en',
                'title' => 'The Second Post',
                'content' => 'This is the content of the Second post.',
                'smallDesc' => 'Intro to the Second post.',
            ],
            // ========== post 2 : ar ==========
            [
                'post_id' => 2,
                'locale' => 'ar',
                'title' => 'البوست الثاني',
                'content' => 'البوست الثاني بوصف كامل.',
                'smallDesc' => 'البوست الثاني بوصف مختصر.',
            ],
        ]);
    }
}
