<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('category')->insert([
            'name' => 'Wedding',
            'image' => 'category1.jpg',
            'description' => 'This is the Wedding category',
            'slug' => 'wedding',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('category')->insert([
            'name' => 'Birthday',
            'image' => 'category2.jpg',
            'description' => 'This is the Birthday category',
            'slug' => 'birthday',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('category')->insert([
            'name' => 'Anniversary',
            'image' => 'category3.jpg',
            'description' => 'This is the Anniversary category',
            'slug' => 'anniversary',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
