<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RuleConditionResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'ruleId' => $this->rule_id,
            'sqlQueryId' => $this->sql_query_id,
        ];
    }
}
