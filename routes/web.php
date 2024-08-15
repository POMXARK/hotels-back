<?php

use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RuleController;
use Illuminate\Support\Facades\Route;


Route::resource('rules', RuleController::class);

Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::post('/notifications/{id}/mark-as-read', [NotificationController::class, 'markAsRead']);
Route::delete('/notifications/{id}', [NotificationController::class, 'destroy']);
Route::get('/notifications/count', [NotificationController::class, 'count']);

Route::get('/{hotel}', [\App\Http\Controllers\HomeController::class, 'index']);

