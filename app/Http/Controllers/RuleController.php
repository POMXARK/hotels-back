<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use App\Models\Rule;
use App\Models\RuleCondition;
use App\Models\SqlQuery;
use Illuminate\Http\Request;

class RuleController extends Controller
{
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
        $rule = new Rule();
        $rule->agency_id = $request->input('agency_id');
        $rule->name = $request->input('name');
        $rule->text_for_manager = $request->input('text_for_manager');
        $rule->is_active = $request->has('is_active');
        $rule->save();

        $ruleConditions = $request->input('rule_conditions');
        foreach ($ruleConditions as $condition) {
            $ruleCondition = new RuleCondition();
            $ruleCondition->rule_id = $rule->id;
            $ruleCondition->sql_query_id = $condition;
            $ruleCondition->save();
        }

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
        $rule = Rule::find($id);
        $rule->agency_id = $request->input('agency_id');
        $rule->name = $request->input('name');
        $rule->text_for_manager = $request->input('text_for_manager');
        $rule->is_active = $request->has('is_active');
        $rule->save();

        $ruleConditions = $request->input('rule_conditions');
        $rule->ruleConditions()->delete();
        foreach ($ruleConditions as $condition) {
            $ruleCondition = new RuleCondition();
            $ruleCondition->rule_id = $rule->id;
            $ruleCondition->sql_query_id = $condition;
            $ruleCondition->save();
        }

        return redirect()->route('rules.index');
    }

    public function destroy($id)
    {
        $rule = Rule::find($id);
        $rule->ruleConditions()->delete();
        $rule->delete();
        return redirect()->route('rules.index');
    }
}
