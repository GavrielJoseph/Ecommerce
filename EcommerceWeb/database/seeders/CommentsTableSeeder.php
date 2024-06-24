<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comments')->delete();
        
        \DB::table('comments')->insert(array (
            0 => 
            array (
                'id' => 6,
                'name' => '321',
                'comment' => 'halo',
                'user_id' => '7',
                'created_at' => '2024-06-15 15:57:27',
                'updated_at' => '2024-06-15 16:01:06',
                'likes' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => '321',
                'comment' => 'coba lagi',
                'user_id' => '7',
                'created_at' => '2024-06-15 10:42:36',
                'updated_at' => '2024-06-15 16:01:11',
                'likes' => 1,
            ),
            2 => 
            array (
                'id' => 1,
                'name' => '321',
                'comment' => 'Halo saya coba komen',
                'user_id' => '7',
                'created_at' => '2024-06-15 10:36:11',
                'updated_at' => '2024-06-15 16:06:11',
                'likes' => 1,
            ),
            3 => 
            array (
                'id' => 21,
                'name' => '123',
                'comment' => 'halo',
                'user_id' => '1',
                'created_at' => '2024-06-15 20:18:12',
                'updated_at' => '2024-06-23 16:40:16',
                'likes' => 1,
            ),
        ));
        
        
    }
}