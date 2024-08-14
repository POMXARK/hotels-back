<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TableController extends Controller
{
    public function index()
    {
        $tables = DB::select('SHOW TABLES');
        return response()->json($tables);
    }

    public function fields(Request $request)
    {
        $table = $request->input('table');
        $fields = DB::select("DESCRIBE $table");
        return response()->json($fields);
    }
}
