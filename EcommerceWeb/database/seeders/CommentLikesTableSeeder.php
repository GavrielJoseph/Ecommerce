<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommentLikesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('comment_likes')->delete();
        
        \DB::table('comment_likes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'user_id' => 1,
                'comment_id' => 6,
                'created_at' => '2024-06-15 16:01:06',
                'updated_at' => '2024-06-15 16:01:06',
            ),
            1 => 
            array (
                'id' => 2,
                'user_id' => 1,
                'comment_id' => 2,
                'created_at' => '2024-06-15 16:01:11',
                'updated_at' => '2024-06-15 16:01:11',
            ),
            2 => 
            array (
                'id' => 3,
                'user_id' => 1,
                'comment_id' => 1,
                'created_at' => '2024-06-15 16:06:11',
                'updated_at' => '2024-06-15 16:06:11',
            ),
            3 => 
            array (
                'id' => 5,
                'user_id' => 7,
                'comment_id' => 21,
                'created_at' => '2024-06-23 16:40:16',
                'updated_at' => '2024-06-23 16:40:16',
            ),
        ));
        
        
    }
}