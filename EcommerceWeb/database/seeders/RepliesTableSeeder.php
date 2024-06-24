<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('replies')->delete();
        
        \DB::table('replies')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => '321',
                'comment_id' => '1',
                'reply' => 'nice one',
                'user_id' => '7',
                'created_at' => '2024-06-15 11:11:45',
                'updated_at' => '2024-06-15 11:11:45',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '321',
                'comment_id' => '2',
                'reply' => 'ini coba juga',
                'user_id' => '7',
                'created_at' => '2024-06-15 11:22:55',
                'updated_at' => '2024-06-15 11:22:55',
            ),
            2 => 
            array (
                'id' => 7,
                'name' => '123',
                'comment_id' => '5',
                'reply' => 'bisa',
                'user_id' => '1',
                'created_at' => '2024-06-15 13:39:51',
                'updated_at' => '2024-06-15 13:39:51',
            ),
            3 => 
            array (
                'id' => 8,
                'name' => '123',
                'comment_id' => '1',
                'reply' => 'mantap',
                'user_id' => '1',
                'created_at' => '2024-06-15 13:40:20',
                'updated_at' => '2024-06-15 13:40:20',
            ),
            4 => 
            array (
                'id' => 9,
                'name' => '123',
                'comment_id' => '20',
                'reply' => 'mantap',
                'user_id' => '1',
                'created_at' => '2024-06-15 18:53:20',
                'updated_at' => '2024-06-15 18:53:20',
            ),
        ));
        
        
    }
}