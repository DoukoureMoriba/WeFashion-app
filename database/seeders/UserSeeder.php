<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
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
        $user = new User();
        $user->name = "Edouard";
        $user->email = "edouardwefashion2023@gmail.com";
        $user->password = Hash::make("edouard123456");
        $user->role = "admin";
        $user->save();
    }
}
