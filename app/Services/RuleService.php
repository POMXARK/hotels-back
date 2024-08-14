<?php

namespace App\Services;

use App\Repositories\RuleRepository;

class RuleService
{
    public function __construct(private RuleRepository $ruleRepository)
    {
    }

    public function createRule(array $ruleData)
    {
        return $this->ruleRepository->create($ruleData);
    }

    public function updateRule(int $ruleId, array $ruleData)
    {
        return $this->ruleRepository->update($ruleId, $ruleData);
    }

    public function deleteRule(int $ruleId)
    {
        return $this->ruleRepository->delete($ruleId);
    }
}
