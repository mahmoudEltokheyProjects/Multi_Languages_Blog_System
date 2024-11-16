<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        // ============= Disable foreign key checks =============
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        // ============= Truncate dependent table first =============
        DB::table('setting_translations')->truncate();
        DB::table('settings')->truncate();
        // ============= Enable foreign key checks =============
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');
        // ========================== settings table ==========================
        // insert the settings table
        DB::table('settings')->insert([
            [
                'logo' => 'images/logo.jpg',
                'favicon' => 'images/logo.jpg',
                'facebook' => 'https://facebook.com',
                'instagram' => 'https://instagram.com',
                'phone' => '+123456789',
                'email' => 'info@example.com',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        // ========================== setting_translations table ==========================
        // Get the inserted setting's ID (if needed for manual association)
        $settingId = DB::table('settings')->first()->id;
        // Insert into the `setting_translations` table
        DB::table('setting_translations')->insert([
            [
                'setting_id' => $settingId,
                'locale' => 'en',
                'title' => 'Website Settings',
                'content' => 'This is the content for website settings in English.',
                'address' => '123 Main Street, City, Country',
            ],
            [
                'setting_id' => $settingId,
                'locale' => 'ar',
                'title' => 'إعدادات الموقع',
                'content' => 'هذا هو المحتوى الخاص بإعدادات الموقع باللغة العربية.',
                'address' => '123 الشارع الرئيسي، المدينة، البلد',
            ],
        ]);
    }
}
