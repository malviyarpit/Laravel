<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('album')->insert([
            'category_id' => 1,
            'name' => 'Rajasthani Wedding',
            'image' => 'rajasthani.jpg',
            'description' => 'This is the shoot of a rajasthani wedding',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('album')->insert([
            'category_id' => 1,
            'name' => 'Gujarati Wedding',
            'image' => 'gujarati.jpg',
            'description' => 'This is the shoot of a gujarati wedding',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('album')->insert([
            'category_id' => 1,
            'name' => 'South Wedding',
            'image' => 'south.jpg',
            'description' => 'This is the shoot of a south wedding',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('album')->insert([
            'category_id' => 2,
            'name' => 'Girl Birthday',
            'image' => 'birthday_1.jpg',
            'description' => 'This is the shoot of 1st birthday of a girl',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('album')->insert([
            'category_id' => 2,
            'name' => 'Boy Birthday',
            'image' => 'birthday_2.jpg',
            'description' => 'This is the shoot of 1st birthday of a boy',
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }
}
