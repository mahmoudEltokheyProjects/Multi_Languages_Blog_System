<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        // Truncate the settings table
        DB::table('users')->truncate();
        // insert the settings table
        DB::table('users')->insert([
            [
                'name' => 'Admin User',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456789'),
                'status' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Writer User',
                'email' => 'writer@writer.com',
                'password' => Hash::make('123456789'),
                'status' => 'writer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
