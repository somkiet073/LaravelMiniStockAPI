<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([
            'category_name' =>  'laptop',
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);
        
        DB::table('categories')->insert(
        [
            'category_name' =>  'smartphone',
            'updated_at' => NOW(),
            'created_at' => NOW(),
        ]);
    }
}
