<?php

namespace App\Utils;

class ApiResponse{

    public static function success($data = null, $message = '', $statusCode = 200,$token='')
    {
        return response()->json(
            [
                "status" => 0,
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
                "status" => 1,
                "data" => $data ?? [],
                "token" => $token,
                'message' => $message,

            ],
            $statusCode
        );
    }

    public static function errorValidation($data = null, $message = '', $statusCode = 422, $token='')
    {
        return response()->json(
            [
                "status" => 2,
                "data" => $data ?? [],
                "token" => $token,
                'message' => $message,

            ],
            $statusCode
        );
    }


}