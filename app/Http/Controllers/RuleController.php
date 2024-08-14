<?php

// app/Http/Controllers/RuleController.php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Rule;
use App\Models\SqlQuery;
use App\Services\RuleService;
use Illuminate\Http\Request;

class RuleController extends Controller
{
    public function __construct(private RuleService $ruleService)
    {
    }

    public function index()
    {
        $rules = Rule::with('agency', 'ruleConditions.sqlQuery')->get();
        return view('rules.index', compact('rules'));
    }

    public function create()
    {
        $agencies = Agency::all();
        $sqlQueries = SqlQuery::all();
        return view('rules.create', compact('agencies', 'sqlQueries'));
    }

    public function store(Request $request)
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

    public function edit($id)
    {
        $rule = Rule::with('agency', 'ruleConditions.sqlQuery')->find($id);
        $agencies = Agency::all();
        $sqlQueries = SqlQuery::all();
        return view('rules.edit', compact('rule', 'agencies', 'sqlQueries'));
    }

    public function update(Request $request, $id)
    {
        $ruleData = [
            'agency_id' => $request->input('agency_id'),
            'name' => $request->input('name'),
            'text_for_manager' => $request->input('text_for_manager'),
            'is_active' => $request->has('is_active'),
        ];

        $this->ruleService->updateRule($id, $ruleData);

        return redirect()->route('rules.index');
    }

    public function destroy($id)
    {
        $this->ruleService->deleteRule($id);

        return redirect()->route('rules.index');
    }
}
