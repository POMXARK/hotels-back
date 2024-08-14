<?php

namespace App\Http\Controllers;

use App\Services\RuleService;
use Illuminate\Http\Request;
use App\Models\Hotel;
use App\Models\Rule;
use App\Models\Agency;

class HomeController extends Controller
{
    public function __construct(protected RuleService $ruleService)
    {
    }

    public function index(Hotel $hotel)
    {
        $agencies = Agency::all();

        foreach ($agencies as $agency) {
            $rules = Rule::query()->where('agency_id', $agency->id)->get();
// App\Models\HotelAgreement::query()->where(['hotel_id' => 1])->with('company','hotel.options','hotel.city.country')->get();
            foreach ($rules as $rule) {
                if ($this->ruleService->checkRule($rule, $hotel)) {
                    echo "Текст для менеджера: ". $rule->text_for_manager. " (Агентство: ". $agency->name. ")\n";
                }
            }
        }

//        return view('home');
    }
}
