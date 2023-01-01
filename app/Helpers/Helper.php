<?php

function getLoggedInUser($as_array = false)
{
    $user = Auth::user();//auth('api')->user();

    if($as_array){
        return $user->toArray();
    }

    return $user;
}

/**
 * Alter request data
 *
 * @param $request
 * @return mixed
 */
function removeTokenFromRequestData($request)
{
    unset($request['token']);
    if(isset($request['g_recaptcha'])){
        unset($request['g_recaptcha']);
    }
    foreach ($request as $key=>$item){
        if(!is_array($item)){;
            $val = trim($item);
            $val = _cleanInput($val);
            $request[$key] = $val;
        }
    }
    return $request;
}

function _cleanInput($string) {
    return preg_replace('/-+/', '-', $string); // Replaces multiple hyphens with single one.
}

function getTimeNow(){
    return Carbon\Carbon::now();
}
