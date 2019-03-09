<?php
namespace App\Request;

use App\Formats\CodeJson;
use App\Formats\CodeXml;

class Request
{
    protected $type;
    protected $content;
    protected $contentType;
    protected $parameters = [];
    protected $method;

    function __construct()
    {
        $this->type = $_SERVER['REQUEST_METHOD'];
        $this->content = file_get_contents('php://input');
        $this->contentType = $_SERVER['CONTENT_TYPE'];

        $body = [];
        if ($this->contentType === 'application/json') {
            $body = CodeJson::decode($this->content);
        } elseif ($this->contentType === 'application/xml') {
            $body = codeXml::decode($this->content);
        }

        $this->method = $body['method'] ?? '';
        $this->parameters = $body['params'] ?? [];
    }

    public function getType(): string
    {
        return $this->type;
    }

    public function getContentType(): string
    {
        return $this->contentType;
    }

    public function getMethod(): string
    {
        return $this->method;
    }

    public function getParameters(): array
    {
        return $this->parameters;
    }

    public function getParameter(string $name)
    {
        return $this->parameters[$name] ?? null;
    }
}