<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesTableSeeder extends Seeder
{
    public function run()
    {
        // ============= Disable foreign key checks =============
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // ============= Truncate dependent table first =============
        DB::table('category_translations')->truncate();
        DB::table('categories')->truncate();
        // ============= Enable foreign key checks =============
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // ============= categories table =============
        DB::table('categories')->insert([
            [
                'image' => 'images/category1.jpg',
                'parent' => 0,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'image' => 'images/category2.jpg',
                'parent' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // ============= category_translations table =============
        DB::table('category_translations')->insert([
            // +++++++++++ category1 +++++++++++
            [
                'category_id' => 1,
                'locale' => 'en',
                'title' => 'Electronics',
                'content' => 'All about electronics',
            ],
            [
                'category_id' => 1,
                'locale' => 'ar',
                'title' => 'ثلاجة',
                'content' => 'ثلاجة توشيبا و فريزر',
            ],
            // +++++++++++ category2 +++++++++++
            [
                'category_id' => 2,
                'locale' => 'en',
                'title' => 'TV',
                'content' => 'All about TV',
            ],
            [
                'category_id' => 2,
                'locale' => 'ar',
                'title' => 'شاشة عرض تلفزيونية',
                'content' => 'شاشة عرض تلفزيونية عالية الجودة',
            ],
        ]);
    }
}
