<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Setting::create([
            'about_us' => 'lorem',
            'email' => 'admin@admin.com',
            'contact' => '1234567890'
        ]);

        \App\Models\User::create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('123456'),
            'is_admin' => true
        ]);
    }
}
