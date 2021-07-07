<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            ['brand_id' => 1, 'name' => 'Shoes', 'price' => 1000],
            ['brand_id' => 1, 'name' => 'Shirts', 'price' => 1500],
            ['brand_id' => 2, 'name' => 'Shoes', 'price' => 2000],
            ['brand_id' => 2, 'name' => 'Shirts', 'price' => 2500],
            ['brand_id' => 3, 'name' => 'Shoes', 'price' => 3000],
            ['brand_id' => 3, 'name' => 'Shirts', 'price' => 3500],
        ]);
    }
}
