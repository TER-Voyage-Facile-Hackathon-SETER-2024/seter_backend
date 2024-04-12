<?php

namespace App\Utils;

class ApiResponse{

    public static function success($data = null, $message = '', $statusCode = 200,$token='')
    {
        return response()->json(
            [
                "status" => true,
                "data" => $data ?? [],
                "token" => $token,
                "message" => $message,

            ],
            $statusCode
        );
    }

    public static function error($data = null, $message = '', $statusCode = 400, $token='')
    {
        return response()->json(
            [
                "status" => false,
                "data" => $data ?? [],
                "token" => $token,
                'message' => $message,

            ],
            $statusCode
        );
    }


}