<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\VinLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function getVinResponseTwo(Request $request)
    {
        ini_set('max_execution_time', 10000);
        ini_set('memory_limit', '-1');

        $vin = $request->get('vin');

        // Query the database using DB::table
        $log = DB::table('vin_logs')->whereIn('vin', $vin)->get();

        if ($log) {
            // Decode the response JSON from the database
            $response = json_decode($log->response);

            return response()->json($response, 200);
        }

        return response()->json([
            'code' => 'ct-404',
            'message' => 'VIN not found',
            'success' => false,
        ], 404);
    }


    public function getVinResponse2(Request $request)
    {

        // ini_set('max_execution_time', 10000);
        // ini_set('memory_limit', '-1');
        $vin = $request->get('vin')->first();

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

    public function showLastTenItems()
    {
        // Retrieve the last 10 items from the vin_logs table
        $lastTenLogs = VinLog::latest()->take(10)->get();

        // Return the response as JSON
        return response()->json($lastTenLogs, 200);
    }
}
