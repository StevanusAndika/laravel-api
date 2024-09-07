<?php

namespace App\Helpers;

use Illuminate\Http\Response;

class ApiResponse
{
    /**
     * Format success response.
     *
     * @param mixed $data
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function success($data, $message = 'Operation successful', $statusCode = Response::HTTP_OK)
    {
        return response()->json([
            'status' => 'success',
            'message' => $message,
            'data' => $data,
            'status_code' => $statusCode
        ], $statusCode);
    }

    /**
     * Format error response.
     *
     * @param string $message
     * @param int $statusCode
     * @return \Illuminate\Http\JsonResponse
     */
    public static function error($message, $statusCode = Response::HTTP_BAD_REQUEST)
    {
        return response()->json([
            'status' => 'error',
            'message' => $message,
            'data' => null,
            'status_code' => $statusCode
        ], $statusCode);
    }
}
