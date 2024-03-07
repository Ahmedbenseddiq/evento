<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'name' => 'admin',
                'email' => 'admin@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'admin',
            ],
            [
                'name' => 'organizer',
                'email' => 'organizer@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'organizer',
            ],
            [
                'name' => 'client',
                'email' => 'client@example.com',
                'password' => bcrypt('12345678'),
                'role' => 'client',
            ],
        ]);
    }
}
