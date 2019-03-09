<?php


namespace App\Response;


use App\Formats\CodeJson;
use App\Request\Request;
use phpDocumentor\Reflection\Types\Boolean;

class Response
{
    protected $type;
    protected $success = false;
    protected $errors = [];
    protected $data = [];

    public function __construct(Request $request)
    {
        $this->type = $request->getContentType();
    }
    public function setSuccess(bool $success): self
    {
        $this->success = $success;
        return $this;
    }

    public function addErrors(String $error): self
    {
        $this->errors[] = $error;
        return $this;
    }

    public function addData(String $name, String $data): self
    {
        $this->data[$name] = $data;
        return $this;
    }

    public function build(): string
    {
        header('Content-Type: application/json');

        $data['success'] = $this->success;
        $data['errors'] = $this->errors;
        $data['data'] = $this->data;

        if ($this->type === 'application/json'){

            return CodeJson::encode($data);
        }

        return '{}';
    }

}