<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * Handle API response type
     *
     * @param string $response
     * @param string $status_code
     * @param string $msg
     * @return \Illuminate\Contracts\Routing\ResponseFactory|\Illuminate\Http\Response
     */
    public function apiResponse($response=[],$status_code = API_RES_STATUS_SUCCESS, $status=false, $msg ='')
    {
        return response(['data'=>$response, 'status' => $status, 'msg' => $msg],$status_code)->header('Content-Type', 'application/json');
    }
}
