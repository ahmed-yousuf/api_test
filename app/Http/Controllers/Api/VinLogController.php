<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\LogApi;
use App\Models\VinLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VinLogController extends Controller
{
    public function getVinResponse(Request $request)
    {
        // Start measuring execution time
        $startTime = microtime(true);

        ini_set('max_execution_time', 10000);
        ini_set('memory_limit', '-1');


        $vin = $request->get('vin');

        $clientIp = $request->ip();
        $userAgent = $request->header('User-Agent');

        $log = VinLog::where('vin', $vin)->first();

        if ($log) {

            // return response()->json(json_decode($log->response), 200);
            $response = json_decode($log->response);
            $statusCode = 200;
        } else {
            $response = [
                'code' => 'ct-404',
                'message' => 'VIN not found',
                'success' => false,
            ];
            $statusCode = 404;
        }
        $endTime = microtime(true);
        $executionTime = round(($endTime - $startTime) * 1000, 2);

        // Save the log in the database
        LogApi::create([
            'vin' => $vin,
            'ip_address' => $clientIp,
            'user_agent' => $userAgent,
            'status_code' => $statusCode,
            'response_time_ms' => $executionTime,
        ]);

        return response()->json($response, $statusCode);
    }

    public function getVinLogCount()
    {
        // Fetch the count of VIN logs from the database
        $vinLogCount = VinLog::count();

        // Return the count in a JSON response
        return response()->json([
            'code' => 'ct-200',
            'message' => 'VIN log count fetched successfully',
            'success' => true,
            'data' => [
                'vin_log_count' => $vinLogCount,
            ],
        ], 200);
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
