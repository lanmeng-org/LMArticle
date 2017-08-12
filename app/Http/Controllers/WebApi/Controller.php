<?php
namespace App\Http\Controllers\WebApi;

use App\Http\Controllers\Controller as BaseController;
use Lanmeng\Utils\ApiResponse;

class Controller extends BaseController
{
    protected $apiResponse;

    public function __construct(ApiResponse $apiResponse)
    {
        $this->apiResponse = $apiResponse;
    }
}
