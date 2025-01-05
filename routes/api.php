<?php

use App\Http\Controllers\Api\VinLogController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::get('/vin-log', [VinLogController::class, 'getVinResponse']);
Route::get('/vin-log-db', [VinLogController::class, 'getVinResponseTwo']);
Route::get('/all-log', [VinLogController::class, 'showLastTenItems']);
Route::get('/all', [VinLogController::class, 'getVinLogCount']);
