<?php
namespace App\Http\Requests\WebApi;

use Bigecko\Utils\ApiResponse;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Foundation\Http\FormRequest;

class Request extends FormRequest
{
    protected function failed($msg, $code)
    {
        $apiResponse = new ApiResponse();
        $params = [
            'msg' => $msg,
            'data' => null,
        ];
        $response = call_user_func_array([$apiResponse, "error$code"], $params);

        throw new HttpResponseException($response);
    }
}
