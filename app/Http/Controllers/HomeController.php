<?php

namespace App\Http\Controllers;

use App\Services\RuleService;
use App\Models\Hotel;

class HomeController extends Controller
{
    public function __construct(protected RuleService $ruleService)
    {
    }

    public function index(Hotel $hotel): void
    {
        $this->ruleService->checkRule($hotel->id);
    }
}
