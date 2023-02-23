<?php

namespace Database\Seeders;

use App\Models\Size;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PivotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       
       for ($i = 0; $i < 240; $i++) {
        $product = Product::all()->random();
        $size = Size::all()->random();
        $product->sizes()->syncWithoutDetaching([$size->id => ['created_at' => Carbon::now(),'updated_at' => Carbon::now()]]);

    }
    }
}
