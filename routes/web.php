<?php

use App\Http\Controllers\QueryController;
use App\Http\Controllers\RuleController;
use App\Http\Controllers\TableController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SqlQueryController;

//Route::get('/', function () {
//    return view('welcome');
//});


//Route::get('/rules', [\App\Http\Controllers\RuleController::class, 'index'])->name('rules');
//Route::get('/{hotel}', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');



Route::prefix('sql-queries')->group(function () {

    Route::get('test', function () {
        return 'ok';
    });

    Route::get('/', [SqlQueryController::class, 'index'])->name('sql-queries.index');
    Route::get('/create', [SqlQueryController::class, 'create'])->name('sql-queries.create');
//    Route::post('/', [SqlQueryController::class, 'store'])->name('sql-queries.store');
    Route::post('/', [QueryController::class, 'store']);
});

Route::get('/tables', [TableController::class, 'index']);
Route::get('/fields', [TableController::class, 'fields']);


Route::resource('rules', RuleController::class);
