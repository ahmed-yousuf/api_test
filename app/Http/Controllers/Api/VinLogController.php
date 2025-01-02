<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VinLog;
use Illuminate\Http\Request;

class VinLogController extends Controller
{
    public function getVinResponse(Request $request)
    {

        ini_set('max_execution_time', 10000);
        ini_set('memory_limit', '-1');
        $vin = $request->get('vin');

        $log = VinLog::where('vin', $vin)->first();

        if ($log) {
            return response()->json(json_decode($log->response), 200);
        }

        return response()->json([
            'code' => 'ct-404',
            'message' => 'VIN not found',
            'success' => false,
        ], 404);
    }
}
