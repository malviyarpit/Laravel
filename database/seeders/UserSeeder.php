<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userData = null;
        $userModel = new User();
        $userModel->name = "admin";
        $userModel->email = "admin@test.com";
        $userModel->password = bcrypt("test1234");
        if ($userModel->save()) {
            $userData = $userModel;
         }

         DB::table('user_roles')->insert([
            'rid' => 1,
            'uid' => $userData->id,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s'),
         ]);
    }
}
