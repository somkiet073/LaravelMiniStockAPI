<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'product_name' => 'lenovo thinkpad', 
            'product_detail' => 'หน่วยประมวลผล Intel Core i5-10210U Processor (1.60GHz, up to 4.20GHz with Turbo Boost, 4 Cores, 6MB Cache)', 
            'product_price' => 32000.00, 
            'category_id' => 1,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);
        
        DB::table('products')->insert([
            'product_name' => 'samsung galaxy s20', 
            'product_detail' => 'Display size, resolution	6.2-inch AMOLED Pixel density	563ppi', 
            'product_price' => 28900.00, 
            'category_id' => 2,
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]); 
    }
}
