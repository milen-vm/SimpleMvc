<?php
namespace SimpleMvc;

class Request
{

    private $uri;

    private $controller;

    private $action;

    private $method;

    private $params;

    public function __construct()
    {
        $this->setUri();
        $this->setMethod();
        $this->parseUri();
    }

    private function setUri()
    {
        $request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $baseDir = dirname(dirname($_SERVER['PHP_SELF']));

        $this->uri = trim(str_replace($baseDir, '', $request), '/');
    }

    private function setMethod()
    {
        $this->method = $_SERVER['REQUEST_METHOD'];
    }

    private function parseUri()
    {
        $parts = [];
        if ($this->uri) {
            $parts = explode('/', $this->uri);

            if (array_search('', $parts) !== false) {
                $parts = array_filter($parts, function ($val) {
                    return $val !== '';
                });
            }
        }

        if (count($parts)) {
            $this->controller = strtolower(array_shift($parts));

            if (count($parts)) {
                $this->action = strtolower(array_shift($parts));
            }
        }

        $this->params = $parts;
    }
}