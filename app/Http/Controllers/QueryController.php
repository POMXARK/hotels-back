<?php

namespace App\Http\Controllers;

use App\Models\SqlQuery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QueryController extends Controller
{
    public function store(Request $request)
    {
        $where = '';

        $data = $request->all();
        $select = "SELECT ". $data['select-field']. " FROM ". $data['select-table'];

        if ($data['where-field'] || $data['value']) {
            $where.= " WHERE ". $data['where-field']. " ". $data['operator']. " '". $data['value']. "'";
        }

        SqlQuery::query()->create([
            'name' => $data['name'] ?? ' ',
            'description' => $data['description'] ?? ' ',
            'select' => $select,
            'where' => $where,
        ]);

        return response()->json(['query' => $select .' '. $where]);
    }
}
