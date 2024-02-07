<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Hash;

class FormSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $classes = [
            [
                'name' => 'Administrator',
                'password' => Hash::make('ithanga2014'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],

            [
                'name' => 'admin',
                'phone' => '0742667314',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ];

        \Illuminate\Support\Facades\DB::table('forms')->insert($classes);
    }
}
