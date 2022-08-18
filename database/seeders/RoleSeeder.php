<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            1 => [
                'role' => 'User',
            ],
            2 => [
                'role' => 'Clinic',
            ]
        ]);
    }
}
