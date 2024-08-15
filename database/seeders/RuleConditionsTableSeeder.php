<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RuleConditionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruleConditions = [
            [
                'rule_id' => 1,
                'sql_query_id' => 1,
            ],
            [
                'rule_id' => 1,
                'sql_query_id' => 2,
            ],
            [
                'rule_id' => 1,
                'sql_query_id' => 3,
            ],
            [
                'rule_id' => 1,
                'sql_query_id' => 4,
            ],
            [
                'rule_id' => 1,
                'sql_query_id' => 5,
            ],
            [
                'rule_id' => 1,
                'sql_query_id' => 6,
            ],
            [
                'rule_id' => 1,
                'sql_query_id' => 7,
            ],
            [
                'rule_id' => 1,
                'sql_query_id' => 8,
            ],
        ];

        foreach ($ruleConditions as $condition) {
            DB::table('rule_conditions')->insert($condition);
        }
    }
}
