<?php

namespace Lanmeng\Utils;

use Illuminate\Http\Response;

class ApiResponse
{
    protected $header = [];

    public function setHeader(array $header)
    {
        $this->header = $header;

        return $this;
    }

    protected function errorContent($code, $msg, array $data = [])
    {
        $content = [
            'msg'  => $msg,
        ] + $data;

        return new Response($content, $code, $this->header);
    }

    /**
     * 200 Ok
     * 请求已成功，请求所希望的响应头或数据体将随此响应返回。
     * @param null   $data
     * @return Response
     */
    public function success200($data = '')
    {
        return new Response($data, 200, $this->header);
    }

    /**
     * 400 Bad Request
     * 由于包含语法错误，当前请求无法被服务器理解。
     * 除非进行修改，否则客户端不应该重复提交这个请求。
     * @param      $msg
     * @param null $data
     * @return Response
     */
    public function error400($msg, array $data = [])
    {
        return $this->errorContent(400, $msg, $data);
    }

    /**
     * 403 Forbidden
     * 服务器已经理解请求，但是拒绝执行它。与401响应不同的是，身份验证并不能提供任何帮助，而且这个请求也不应该被重复提交。
     * @param      $msg
     * @param null $data
     * @return Response
     */
    public function error403($msg, array $data = [])
    {
        return $this->errorContent(403, $msg, $data);
    }

    /**
     * 500 Internal Server Error
     * 服务器遇到了一个未曾预料的状况，导致了它无法完成对请求的处理。
     * 一般来说，这个问题都会在服务器的程序码出错时出现。
     * @param      $msg
     * @param null $data
     * @return Response
     */
    public function error500($msg, array $data = [])
    {
        return $this->errorContent(500, $msg, $data);
    }
}
