<?php


namespace App\Controllers;

use App\FileManager\File;
use App\FileManager\FilesList;
use App\Request\Request;
use App\Response\Response;

class ApiController
{
    const ROOT_PATH = '/var/www/html/storage/';

    /** @var Request */
    protected $request;
    /** @var Response */
    protected $response;

    public function __construct(Request $request, Response $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    public function handled(): string
    {
        $method = $this->request->getMethod();

        if (!method_exists(self::class, $method)) {
            return $this->response->addErrors('Wrong Method')->build();
        }

        if (!$this->$method()) {
            return $this->response->addErrors('Can`t do operation.')->build();
        }

        return $this->response
            ->setSuccess(true)
            ->build();
    }

    private function store()
    {
        return (new File())->put(
            self::ROOT_PATH . $this->request->getParameter('name'),
            $this->request->getParameter('file')
        );
    }

    private function download()
    {
        $file = (new File())->get(
            self::ROOT_PATH . $this->request->getParameter('name')
        );

        $this->response->addData('file', $file);

        return (bool)$file;
    }

    private function delete()
    {
        return (new File())->unlink(
            self::ROOT_PATH . $this->request->getParameter('name')
        );
    }

    private function list()
    {
        $list = (new FilesList())
            ->getList(
                self::ROOT_PATH
            );


        $this->response->addData('files', $list);

        return (bool)$list;
    }
}