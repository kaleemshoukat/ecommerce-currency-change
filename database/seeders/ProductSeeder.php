<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\ProductSize;
use Faker\Factory;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker=Factory::create();
        for ($i=0; $i<10; $i++){
            $product=new Product();
            $product->name=$faker->name;
            $product->quantity=rand(1, 50);
            $product->price=rand(200, 600);
            $product->save();

            for ($j=1; $j<=3; $j++){
                $product_size=new ProductSize();
                $product_size->product_id=$product->id;
                $product_size->size_id=$j;
                $product_size->save();
            }
        }
    }
}
