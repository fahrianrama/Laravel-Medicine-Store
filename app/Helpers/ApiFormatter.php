<?php

namespace App\Helpers;

class ApiFormatter
{
    public static function format($data, $status = 200, $message = 'OK')
    {
        $response = [
            'status' => $status,
            'message' => $message,
            'data' => $data,
        ];

        return response()->json($response, $status);
    }
}