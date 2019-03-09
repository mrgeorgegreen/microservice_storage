<?php
namespace App\Request;

use App\Formats\CodeJson;

class Request
{
    protected $type;
    protected $content;
    protected $contentType;
    protected $parameters = [];

    function __construct()
    {
        $this->type = $_SERVER['REQUEST_METHOD'];
        $this->content = file_get_contents('php://input');
        $this->contentType = $_SERVER['CONTENT_TYPE'];

        if ($this->contentType === 'application/json') {
            $this->parameters = CodeJson::decode($this->content);
        } elseif ($this->contentType === 'application/xml') {
//            $this->parameters = codeJson::decode($this->content);
        }

    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getParameter(string $name)
    {
        return $this->parameters[$name] ?? null;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }
}