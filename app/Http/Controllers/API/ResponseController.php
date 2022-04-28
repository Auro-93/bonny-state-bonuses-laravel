<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ResponseController extends Controller
{
    public function sendResponse($result, $message, $status = 200)
    {
    	$response = [
            'success' => true,
            'statusCode' => $status,
            'message' => $message,
            'data'  => $result,
          
        ];
        return response()->json($response, $status);
    }

    public function sendError($error, $errorMessages = [], $status = 404)
    {
    	$response = [
            'success' => false,
            'statusCode' => $status,
            'message' => $error,
        ];

        if(!empty($errorMessages)){
            $response['data']['errors'] = $errorMessages;
        }
        
        return response()->json($response, $status);
    }
}
