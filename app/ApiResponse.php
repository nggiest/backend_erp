<?php

namespace App;

trait ApiResponse
{
    protected function successResponse($data = null, string $message = "Success", int $code = 200){
        return response()->json([
            'status' => 'success',
            'message'=> $message,
            'data' => $data,
        ], $code);
    }

    protected function errorResponse(string $message = 'Error', int $code = 400, $errors = null)
    {
        return response()->json([
            'status'  => 'error',
            'message' => $message,
            'errors'  => $errors,
        ], $code);
    }
}
