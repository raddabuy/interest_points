<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cities')->insert(
            [
                [
                    'name' => 'Москва',
                    'en_name' => 'Moscow',
                    'code' => 'MOW',
                ],
                [
                    'name' => 'Пермь',
                    'en_name' => 'Perm',
                    'code' => 'PER',
                ],
                [
                    'name' => 'Екатеринбург',
                    'en_name' => 'Yekaterinburg',
                    'code' => 'SVE',
                ],
            ],
        );
    }
}
