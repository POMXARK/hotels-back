<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SqlQueriesTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('sql_queries')->insert([
            [
                'id' => 1,
                'name' => 'Город',
                'description' => 'Если город отеля (равно | не равно) cities.id',
                'select' => 'SELECT * FROM countries JOIN cities ON countries.id = cities.country_id JOIN hotels ON cities.id = hotels.city_id',
                'where' => 'WHERE countries.id = 1'
            ],
            [
                'id' => 2,
                'name' => 'Страна',
                'description' => 'Если страна отеля (равно | не равно) countries.id',
                'select' => 'SELECT * FROM cities JOIN hotels ON cities.id = hotels.city_id',
                'where' => 'WHERE cities.id = 1'
            ],
            [
                'id' => 3,
                'name' => 'Звездность',
                'description' => 'Если звездность отеля (равно | не равно) hotels.stars',
                'select' => 'SELECT * FROM hotels',
                'where' => 'WHERE hotels.stars = 5'
            ],
            [
                'id' => 4,
                'name' => 'Комиссия или скидка',
                'description' => 'Если в договоре комиссия или скидка hotel_agreements.discount_percent',
                'select' => 'SELECT * FROM hotel_agreements',
                'where' => 'WHERE discount_percent > 1 AND comission_percent = 0'
            ],
            [
                'id' => 5,
                'name' => 'Договор по умолчанию',
                'description' => 'Если договор по умолчанию hotel_agreements.is_default',
                'select' => 'SELECT * FROM hotel_agreements',
                'where' => 'WHERE is_default = 1'
            ],
            [
                'id' => 6,
                'name' => 'Черный список',
                'description' => 'Если черный список agency_hotel_options.is_black',
                'select' => 'SELECT * FROM agency_hotel_options',
                'where' => 'WHERE is_black = 0'
            ],
            [
                'id' => 7,
                'name' => 'Рекомендованный отель ',
                'description' => 'Если рекомендованный отель agency_hotel_options.is_recomend',
                'select' => 'SELECT * FROM agency_hotel_options',
                'where' => 'WHERE is_recomend = 0'
            ],
            [
                'id' => 8,
                'name' => 'Белый список',
                'description' => 'Если белый список agency_hotel_options.is_black',
                'select' => 'SELECT * FROM agency_hotel_options',
                'where' => 'WHERE is_white = 0'
            ],
        ]);
    }
}
