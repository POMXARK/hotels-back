<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Hotel;
use App\Models\HotelAgreement;
use Illuminate\Database\Eloquent\Factories\Factory;

class HotelAgreementFactory extends Factory
{
    protected $model = HotelAgreement::class;

    public function definition()
    {
        return [
            'hotel_id' => Hotel::factory(),
            'discount_percent' => $this->faker->numberBetween(1, 100),
            'comission_percent' => $this->faker->numberBetween(1, 100),
            'is_default' => $this->faker->boolean,
            'vat_percent' => $this->faker->numberBetween(1, 100),
            'vat1_percent' => $this->faker->numberBetween(1, 100),
            'vat1_value' => $this->faker->numberBetween(1, 100),
            'company_id' => Company::factory(),
            'date_from' => $this->faker->dateTime,
            'date_to' => $this->faker->dateTime,
            'is_cash_payment' => $this->faker->boolean,
        ];
    }
}
