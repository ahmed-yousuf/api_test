<?php

use App\Http\Controllers\Api\VinLogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/vin-log', [VinLogController::class, 'getVinResponse']);
