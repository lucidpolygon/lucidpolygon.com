<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Thaha',
            'email' => 'thaha@lucidpolygon.com',
            'password' => Hash::make('password'),
        ]);
        DB::table('posts')->insert([
            'title' => 'Thaha',
            'slug' => '/',
            'content' => 'a',
            'author_id' =>1,
            'type' => 'page',
            'status' => 'published',
            'meta_title' => 'a',
            'meta_description' => 'a',
            'is_code' => 0
        ]);
    }
}
