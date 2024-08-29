<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('adminadmin'),
            'isAdmin' => true,
            'tlp' => '081368762417'
        ]);
        DB::table('users')->insert([
            'name' => 'tatiya sucitta',
            'email' => 'tatiyas@gmail.com',
            'password' => Hash::make('1234567890'),
            'isAdmin' => true,
            'tlp' => '081368762417'
        ]);
    }
}
