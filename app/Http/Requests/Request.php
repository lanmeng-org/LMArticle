<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class Request extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    protected function failed($error)
    {
        $response = redirect()->back()->withInput()->withErrors($error);

        throw new HttpResponseException($response);
    }
}
