<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
//    public function run(): void
//    {
//        // User::factory(10)->create();
//
//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
//    }

    public function run()
    {
        $tables = [
            'companies',
            'agencies',
            'countries',
            'cities',
            'hotels',
            'hotel_agreements',
            'agency_hotel_options',
            'sql_queries',
            'rules',
            'rule_conditions',
        ];

        foreach ($tables as $tableName) {
            if (DB::table($tableName)->count() == 0) {
                $this->call('Database\Seeders\\' . ucwords(Str::camel($tableName)). 'TableSeeder');
            } else {
                /** @var HasFactory $model */
                $model = 'App\Models\\' . Str::studly(Str::singular($tableName));
                $model::factory()->count(10)->create();
            }
        }
    }
}
