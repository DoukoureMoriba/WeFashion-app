<?php

namespace Database\Seeders;

use App\Models\Size;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sizes = [
            [
                "name" => "XS",
            ],
            [
                "name" => "S",
            ],
            [
                "name" => "M",
            ],
            [
                "name" => "L",
            ],
            [
                "name" => "XL",
            ],
        ];
        
        // Ajouts dans DB
        foreach ($sizes as $size) {
            Size::create($size);
        }
    }
}
