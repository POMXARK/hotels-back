<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SqlQuery;

class SqlQueryController extends Controller
{
    public function index()
    {
        return view('sql-queries.index');
    }

    public function create()
    {
        return view('sql-queries.create');
    }

    public function store(Request $request)
    {
        $sqlQuery = new SqlQuery();
        $sqlQuery->name = $request->input('name');
        $sqlQuery->description = $request->input('description');
        $sqlQuery->select = $request->input('select');
        $sqlQuery->where = $request->input('where');
        $sqlQuery->save();

        return response()->json($sqlQuery);
    }
}
