<?php

namespace Database\Seeders;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // créer une boucle qui va générer 80 produits
        for ($i = 0; $i < 80; $i++) {
            // générer une categorie aleatoire
            $categorie = Category::all()->random();
            DB::table('products')->insert([
                'name' => $faker->word(), 
                'description' => $faker->text(), 
                'price' => $faker->randomFloat(2), 
                'isActivated' => $faker->randomElement([true, false]), 
                'isSale' => $faker->randomElement([true, false]), 
                'reference' =>$faker->word(16), 
                'category_id' => $categorie->id, 
                'image' => "images/" . $categorie->name . "-" . $faker->numberBetween(1, 10) . ".jpg", 
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ]);
        } 
    }
}
