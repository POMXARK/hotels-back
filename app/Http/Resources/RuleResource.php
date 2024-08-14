<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class RuleResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'agencyId' => $this->agency_id,
            'name' => $this->name,
            'textForManager' => $this->text_for_manager,
            'isActive' => $this->is_active,
            'ruleConditions' => RuleConditionResource::collection($this->ruleConditions),
        ];
    }
}
