<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiDecisionController;
use App\Http\Controllers\Api\ApiActivityController;
use App\Http\Controllers\Api\ApiComplaintController;
use App\Http\Controllers\Api\ApiNewsController;
use App\Http\Controllers\Api\ApiServiceController;

Route::apiResource('decisions', ApiDecisionController::class);

Route::apiResource('activities', ApiActivityController::class);
Route::apiResource('complaints', ApiComplaintController::class);
Route::apiResource('news', ApiNewsController::class);
Route::apiResource('services', ApiServiceController::class);

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
