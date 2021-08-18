<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'user_name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => bcrypt('123456')
            ],
            [
                'user_name' => 'tanjed',
                'email' => 'tanjed@admin.com',
                'password' => bcrypt('123456')
            ]
        ];
        User::insert($admins);
    }
}
