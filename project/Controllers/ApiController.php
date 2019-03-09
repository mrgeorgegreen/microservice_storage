<?php


namespace App\Controllers;


use App\Request\ApiRequest;
use App\Request\Request;
use App\Response\Response;

class ApiController
{
    /** @var ApiRequest */
    protected $apiRequest;
    /** @var Response */
    protected $response;

    public function __construct(ApiRequest $apiRequest, Response $response)
    {
        $this->apiRequest = $apiRequest;
        $this->response = $response;
    }

    public function handled(): string
    {
        $method = $this->apiRequest->getMethod();

        if (!method_exists(self::class, $method)){
            return $this->response->addErrors('Wrong Method')->get();
        }

        $this->$method();

        return $this->response->get();
    }

    private function store()
    {
        file_put_contents(
            ('/var/www/html/storage/' . $this->apiRequest->getParameter('name')) ,
            $this->apiRequest->getParameter('file')
        );
    }
}