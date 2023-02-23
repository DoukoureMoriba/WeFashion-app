<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "name" => "homme",
            ],
            [
                "name" => "femme",
            ]
        ];
        
        // Ajouts dans DB
        foreach ($categories as $categorie) {
            Category::create($categorie);
        }
    }
}
