<?php


namespace App\Request;


use App\Request\Request;

class ApiRequest
{
    protected $method;
    protected $params;
    protected $request;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->method = $request->getParameter('method') ?? '';
        $this->params = $request->getParameter('params') ?? [];
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParams(): array
    {
        return $this->params;
    }

    public function getParameter(string $name)
    {
        return $this->params[$name] ?? null;
    }

    public function getRequest(): Request
    {
        return $this->request;
    }
}