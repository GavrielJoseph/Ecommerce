<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('categories')->delete();
        
        \DB::table('categories')->insert(array (
            0 => 
            array (
                'id' => 1,
                'category_name' => 'Phone',
                'created_at' => '2024-05-31 16:44:23',
                'updated_at' => '2024-05-31 16:44:23',
            ),
            1 => 
            array (
                'id' => 2,
                'category_name' => 'Charger',
                'created_at' => '2024-05-31 16:56:14',
                'updated_at' => '2024-05-31 16:56:14',
            ),
            2 => 
            array (
                'id' => 3,
                'category_name' => 'Case',
                'created_at' => '2024-05-31 16:59:21',
                'updated_at' => '2024-05-31 16:59:21',
            ),
            3 => 
            array (
                'id' => 10,
                'category_name' => 'Earphone',
                'created_at' => '2024-06-23 15:32:30',
                'updated_at' => '2024-06-23 15:32:30',
            ),
        ));
        
        
    }
}