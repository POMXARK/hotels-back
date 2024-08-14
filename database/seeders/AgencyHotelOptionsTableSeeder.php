<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgencyHotelOptionsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('agency_hotel_options')->insert([
            ['id' => 1, 'hotel_id' => 1, 'agency_id' => 1, 'percent' => 10, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 2, 'hotel_id' => 2, 'agency_id' => 1, 'percent' => 5, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 3, 'hotel_id' => 3, 'agency_id' => 1, 'percent' => 8, 'is_black' => 1, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 4, 'hotel_id' => 4, 'agency_id' => 1, 'percent' => 12, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 5, 'hotel_id' => 5, 'agency_id' => 1, 'percent' => 8, 'is_black' => 1, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 6, 'hotel_id' => 6, 'agency_id' => 1, 'percent' => 15, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 7, 'hotel_id' => 7, 'agency_id' => 1, 'percent' => 8, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 8, 'hotel_id' => 8, 'agency_id' => 1, 'percent' => 11, 'is_black' => 1, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 9, 'hotel_id' => 9, 'agency_id' => 1, 'percent' => 12, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 10, 'hotel_id' => 10, 'agency_id' => 1, 'percent' => 6, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 11, 'hotel_id' => 1, 'agency_id' => 2, 'percent' => 8, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 12, 'hotel_id' => 2, 'agency_id' => 2, 'percent' => 12, 'is_black' => 1, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 13, 'hotel_id' => 3, 'agency_id' => 2, 'percent' => 6, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 14, 'hotel_id' => 4, 'agency_id' => 2, 'percent' => 10, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 15, 'hotel_id' => 5, 'agency_id' => 2, 'percent' => 9, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0],
            ['id' => 16, 'hotel_id' => 6, 'agency_id' => 2, 'percent' => 11, 'is_black' => 1, 'is_recomend' => 0, 'is_white' => 0,],
            ['id' => 17, 'hotel_id' => 7, 'agency_id' => 2, 'percent' => 4, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0,],
            ['id' => 18, 'hotel_id' => 8, 'agency_id' => 2, 'percent' => 12, 'is_black' => 0, 'is_recomend' => 0, 'is_white' => 0,],
            ['id' => 19, 'hotel_id' => 9, 'agency_id' => 2, 'percent' => 10, 'is_black' => 1, 'is_recomend' => 0, 'is_white' => 0,],
            ['id' => 20, 'hotel_id' => 10, 'agency_id' => 2, 'percent' => 14, 'is_black' => 1, 'is_recomend' => 0, 'is_white' => 0,],
        ]);
    }
}
