<?php
namespace App\Http\Requests\WebApi;

use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;
use Lanmeng\Utils\ApiResponse;

class Request extends FormRequest
{
    protected function failed($msg, $code)
    {
        $apiResponse = new ApiResponse();
        $params = [
            'msg' => $msg,
        ];
        $response = call_user_func_array([$apiResponse, "error$code"], $params);

        throw new HttpResponseException($response);
    }
}
