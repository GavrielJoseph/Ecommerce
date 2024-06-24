<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 7,
                'name' => '321',
                'email' => '321@gmail.com',
                'usertype' => '0',
                'phone' => '0987654321',
                'address' => NULL,
                'email_verified_at' => '2024-06-02 12:12:12',
                'password' => '$2y$10$EOk0/8tnSBCTeD475jfmNuQ91L5UzPdF0b1/D/tnddc7w2Ue38Oi2',
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2024-06-03 17:53:05',
                'updated_at' => '2024-06-03 17:53:05',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            1 => 
            array (
                'id' => 1,
                'name' => '123',
                'email' => '123@gmail.com',
                'usertype' => '0',
                'phone' => '12345678',
                'address' => NULL,
                'email_verified_at' => '2024-06-02 20:51:43',
                'password' => '$2y$10$uFlaHxZ3nckxREsu2kd5EObi3DTAeRCPnvn/t.ickKfwIoqW6QKRi',
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2024-05-28 20:10:55',
                'updated_at' => '2024-05-28 20:10:55',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'adm',
                'email' => 'adm@gmail.com',
                'usertype' => '1',
                'phone' => '87654321',
                'address' => NULL,
                'email_verified_at' => '2024-06-01 20:51:43',
                'password' => '$2y$10$ny5kAYVeX2dt5pPeld9STeLAkATUcz9OQh.MOsDHPsOH3F0qzR6me',
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2024-05-28 20:33:36',
                'updated_at' => '2024-05-28 20:33:36',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            3 => 
            array (
                'id' => 8,
                'name' => 'Gav',
                'email' => 'gavrielj30@gmail.com',
                'usertype' => '0',
                'phone' => '081234567',
                'address' => NULL,
                'email_verified_at' => '2024-06-07 20:51:43',
                'password' => '$2y$10$h1msxtU/zeFd0IMEh0EVOe.OQrJ5nL.rzD1nxzAOyFWy3D7ND5XEu',
                'remember_token' => 'sYaySENL9cekM6m5KrEWXLvAzPTI62mpY2bjRx71cuOHEEGCdFnQXvuPQzyw',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2024-06-07 20:51:02',
                'updated_at' => '2024-06-19 06:58:45',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            4 => 
            array (
                'id' => 9,
                'name' => 'justin',
                'email' => 'gavriel1388@gmail.com',
                'usertype' => '0',
                'phone' => '1234567890',
                'address' => NULL,
                'email_verified_at' => '2024-06-24 04:14:27',
                'password' => '$2y$10$COxJ4H/slP7yRDaC/XknPeVpyB/zoIsR8Kmho7LcPv1mNZnNq2bTG',
                'remember_token' => NULL,
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2024-06-24 04:13:13',
                'updated_at' => '2024-06-24 04:14:27',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
            5 => 
            array (
                'id' => 5,
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'usertype' => '1',
                'phone' => '1234567',
                'address' => NULL,
                'email_verified_at' => '2024-06-01 12:12:12',
                'password' => '$2y$10$fe2AiHDw7JUcCXJ9HlXmzeMPfPuv2piWJ2biMd04cjCs2esRR713K',
                'remember_token' => '5dV8Kn7W53tB8ZS1ws3TQS5ef9aKG9gbGaWcZNmqAISezicSC0hPYfxZf98o',
                'current_team_id' => NULL,
                'profile_photo_path' => NULL,
                'created_at' => '2024-05-28 20:23:43',
                'updated_at' => '2024-05-28 20:23:43',
                'two_factor_secret' => NULL,
                'two_factor_recovery_codes' => NULL,
                'two_factor_confirmed_at' => NULL,
            ),
        ));
        
        
    }
}