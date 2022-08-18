<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function sendResponse($result, $message)
    {
        $response = [
            'data' => $result,
            'success'=>200,
            'message'=>$message,
        ];

        return response()->json($response, 200);
    }

    public function sendError($error, $errorMessages=[]){
        $response=[
            'data'=>null,
            'success'=>500,
            'message'=>$error,
        ];

        if(!empty($errorMessages)){
            $response['message']=$errorMessages;
        }

        return response()->json($response);
    }
}
