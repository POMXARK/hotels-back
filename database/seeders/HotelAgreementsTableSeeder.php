<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HotelAgreementsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('hotel_agreements')->insert([
            ['id' => 1, 'hotel_id' => 1, 'discount_percent' => 10, 'comission_percent' => 0, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 0],
            ['id' => 2, 'hotel_id' => 2, 'discount_percent' => 12, 'comission_percent' => 0, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 0],
            ['id' => 3, 'hotel_id' => 3, 'discount_percent' => 0, 'comission_percent' => 15, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 1],
            ['id' => 4, 'hotel_id' => 4, 'discount_percent' => 12, 'comission_percent' => 0, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 1],
            ['id' => 5, 'hotel_id' => 5, 'discount_percent' => 0, 'comission_percent' => 10, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 1],
            ['id' => 6, 'hotel_id' => 6, 'discount_percent' => 5, 'comission_percent' => 0, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 0],
            ['id' => 7, 'hotel_id' => 7, 'discount_percent' => 0, 'comission_percent' => 12, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 1],
            ['id' => 8, 'hotel_id' => 8, 'discount_percent' => 10, 'comission_percent' => 0, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 1],
            ['id' => 9, 'hotel_id' => 9, 'discount_percent' => 0, 'comission_percent' => 12, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 1],
            ['id' => 10, 'hotel_id' => 10, 'discount_percent' => 14, 'comission_percent' => 0, 'is_default' => 1, 'vat_percent' => 20, 'vat1_percent' => 1, 'vat1_value' => 0, 'company_id' => 1, 'date_from' => '2023-01-01', 'date_to' => '2024-01-01', 'is_cash_payment' => 0],
        ]);
    }
}
