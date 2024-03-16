<?php

namespace App\Http\Middleware;

use App\Facades\Response;
use App\Http\Requests\Request;

abstract class Middleware
{
    private $request;
    private $response;

    public function __construct()
    {
        $this->request = new Request();
        $this->response = Response::getInstance();
    }

    abstract public function handle();
}
