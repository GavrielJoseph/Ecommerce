<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class MigrationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('migrations')->delete();
        
        \DB::table('migrations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'migration' => '2014_10_12_000000_create_users_table',
                'batch' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'migration' => '2014_10_12_100000_create_password_reset_tokens_table',
                'batch' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'migration' => '2014_10_12_200000_add_two_factor_columns_to_users_table',
                'batch' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'migration' => '2019_08_19_000000_create_failed_jobs_table',
                'batch' => 1,
            ),
            4 => 
            array (
                'id' => 5,
                'migration' => '2019_12_14_000001_create_personal_access_tokens_table',
                'batch' => 1,
            ),
            5 => 
            array (
                'id' => 6,
                'migration' => '2024_05_28_175921_create_sessions_table',
                'batch' => 1,
            ),
            6 => 
            array (
                'id' => 7,
                'migration' => '2024_05_29_082612_remove_address_from_users_table',
                'batch' => 2,
            ),
            7 => 
            array (
                'id' => 8,
                'migration' => '2024_05_29_082829_remove_address_from_users_table',
                'batch' => 3,
            ),
            8 => 
            array (
                'id' => 9,
                'migration' => '2024_05_31_163421_create_categories_table',
                'batch' => 4,
            ),
            9 => 
            array (
                'id' => 10,
                'migration' => '2024_06_01_131729_create_products_table',
                'batch' => 5,
            ),
            10 => 
            array (
                'id' => 11,
                'migration' => '2024_06_01_133655_create_products_table',
                'batch' => 6,
            ),
            11 => 
            array (
                'id' => 12,
                'migration' => '2024_06_03_155225_create_carts_table',
                'batch' => 7,
            ),
            12 => 
            array (
                'id' => 13,
                'migration' => '2024_06_03_190857_create_orders_table',
                'batch' => 8,
            ),
            13 => 
            array (
                'id' => 14,
                'migration' => '2024_06_08_093745_create_notifications_table',
                'batch' => 9,
            ),
            14 => 
            array (
                'id' => 15,
                'migration' => '2024_06_15_062410_reviews',
                'batch' => 10,
            ),
            15 => 
            array (
                'id' => 16,
                'migration' => '2024_06_15_063706_create_notifications_table',
                'batch' => 10,
            ),
            16 => 
            array (
                'id' => 17,
                'migration' => '2024_06_15_080621_create_comments_table',
                'batch' => 11,
            ),
            17 => 
            array (
                'id' => 18,
                'migration' => '2024_06_15_080937_create_notifications_table',
                'batch' => 11,
            ),
            18 => 
            array (
                'id' => 19,
                'migration' => '2024_06_15_083716_create_ratings_table',
                'batch' => 12,
            ),
            19 => 
            array (
                'id' => 20,
                'migration' => '2024_06_15_084035_create_ratings_table',
                'batch' => 13,
            ),
            20 => 
            array (
                'id' => 21,
                'migration' => '2024_06_15_101928_create_comments_table',
                'batch' => 14,
            ),
            21 => 
            array (
                'id' => 22,
                'migration' => '2024_06_15_101946_create_replies_table',
                'batch' => 14,
            ),
            22 => 
            array (
                'id' => 23,
                'migration' => '2024_06_15_153832_add_likes_dislikes_to_comments_table',
                'batch' => 15,
            ),
            23 => 
            array (
                'id' => 24,
                'migration' => '2024_06_15_155359_create_comment_likes_table',
                'batch' => 16,
            ),
        ));
        
        
    }
}