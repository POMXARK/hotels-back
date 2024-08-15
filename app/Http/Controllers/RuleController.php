<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Rule;
use App\Models\SqlQuery;
use App\Repositories\RuleConditionRepository;
use App\Services\RuleService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class RuleController extends Controller
{
    public function __construct(private RuleService $ruleService, private RuleConditionRepository $ruleConditionRepository)
    {
    }

    public function index(): View
    {
        $rules = Rule::with('agency', 'ruleConditions.sqlQuery')->get();

        return view('rules.index', compact('rules'));
    }

    public function create(): View
    {
        $agencies = Agency::all();
        $sqlQueries = SqlQuery::all();

        return view('rules.create', compact('agencies', 'sqlQueries'));
    }

    public function store(Request $request): RedirectResponse
    {
        $ruleData = [
            'agency_id' => $request->input('agency_id'),
            'name' => $request->input('name'),
            'text_for_manager' => $request->input('text_for_manager'),
            'is_active' => $request->has('is_active'),
        ];

        $this->ruleService->createRule($ruleData);

        return redirect()->route('rules.index');
    }

    public function edit($id): View
    {
        $rule = Rule::with('agency', 'ruleConditions.sqlQuery')->find($id);
        $agencies = Agency::all();
        $sqlQueries = SqlQuery::all();

        return view('rules.edit', compact('rule', 'agencies', 'sqlQueries'));
    }

    public function update(Request $request, Rule $rule): RedirectResponse
    {
        $ruleData = [
            'agency_id' => $request->input('agency_id'),
            'name' => $request->input('name'),
            'text_for_manager' => $request->input('text_for_manager'),
            'is_active' => $request->has('is_active'),
            'rule_conditions' => $request->input('rule_conditions'),
        ];

        $this->ruleService->updateRule($rule, $ruleData);
        $this->ruleConditionRepository->saveRuleConditions($rule, $request->input('rule_conditions'));

        return redirect()->route('rules.index');
    }

    public function destroy($id): RedirectResponse
    {
        $this->ruleService->deleteRule($id);

        return redirect()->route('rules.index');
    }
}
