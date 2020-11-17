<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

class APIBaseController extends Controller
{
    public function sendResponse($result, $message)
    {
        $respone = [
            'success' => true,
            'data' => $result,
            'message' => $message
        ];

        return response()->json($respone, 200);
    }

    public function sendError($error, $errorMessages = [], $code = 404)
    {
        $response = [
            'success' => false,
            'message' => $error
        ];

        if (!empty($errorMessages)) {
            $response['data'] = $errorMessages;
        }

        return response()->json($response, $code);
    }
}
