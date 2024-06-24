<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('products')->delete();
        
        \DB::table('products')->insert(array (
            0 => 
            array (
                'id' => 10,
                'name' => 'Samsung S22 Ultra',
                'description' => '256GB',
                'price' => '17.000.000',
                'total_discount' => '15.000.000',
                'quantity' => '10',
                'category' => 'Phone',
                'image' => '1717352880.jpg',
                'created_at' => '2024-06-02 18:28:00',
                'updated_at' => '2024-06-02 18:28:00',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Iphone 14PM',
                'description' => '256GB',
                'price' => '18.000.000',
                'total_discount' => NULL,
                'quantity' => '19',
                'category' => 'Phone',
                'image' => '1717347928.jpg',
                'created_at' => '2024-06-01 18:44:51',
                'updated_at' => '2024-06-20 16:09:08',
            ),
            2 => 
            array (
                'id' => 8,
                'name' => 'Samsung S24 Ultra',
                'description' => '256GB',
                'price' => '19.000.000',
                'total_discount' => NULL,
                'quantity' => '18',
                'category' => 'Phone',
                'image' => '1717352731.jpg',
                'created_at' => '2024-06-02 18:25:31',
                'updated_at' => '2024-06-22 09:44:55',
            ),
            3 => 
            array (
                'id' => 7,
                'name' => 'Iphone 12PM',
                'description' => '256GB',
                'price' => '12.000.000',
                'total_discount' => '11.000.000',
                'quantity' => '4',
                'category' => 'Phone',
                'image' => '1717352672.jpg',
                'created_at' => '2024-06-02 18:24:32',
                'updated_at' => '2024-06-22 09:45:18',
            ),
            4 => 
            array (
                'id' => 1,
                'name' => 'Iphone 15PM',
                'description' => '256GB
6GB Ram',
                'price' => '20.000.000',
                'total_discount' => NULL,
                'quantity' => '7',
                'category' => 'Phone',
                'image' => '1717267099.jpg',
                'created_at' => '2024-06-01 18:38:19',
                'updated_at' => '2024-06-22 09:46:27',
            ),
            5 => 
            array (
                'id' => 11,
                'name' => 'casing magsafe',
                'description' => 'casing',
                'price' => '500.000',
                'total_discount' => NULL,
                'quantity' => '9',
                'category' => 'case',
                'image' => '1717439617.jpg',
                'created_at' => '2024-06-03 18:33:37',
                'updated_at' => '2024-06-22 16:25:57',
            ),
            6 => 
            array (
                'id' => 13,
                'name' => 'casing magsafe',
                'description' => 'casing',
                'price' => '200.000',
                'total_discount' => NULL,
                'quantity' => '-1',
                'category' => 'case',
                'image' => '1717439941.jpg',
                'created_at' => '2024-06-03 18:39:01',
                'updated_at' => '2024-06-22 18:14:54',
            ),
            7 => 
            array (
                'id' => 12,
                'name' => 'casing magsafe',
                'description' => 'casing',
                'price' => '50.000',
                'total_discount' => NULL,
                'quantity' => '0',
                'category' => 'case',
                'image' => '1717439924.jpg',
                'created_at' => '2024-06-03 18:38:44',
                'updated_at' => '2024-06-22 18:13:23',
            ),
            8 => 
            array (
                'id' => 15,
                'name' => 'Iphone 15PM',
                'description' => '256GB',
                'price' => '32.323.232',
                'total_discount' => NULL,
                'quantity' => '2',
                'category' => 'Phone',
                'image' => '1719202827.png',
                'created_at' => '2024-06-24 04:20:27',
                'updated_at' => '2024-06-24 04:20:27',
            ),
        ));
        
        
    }
}