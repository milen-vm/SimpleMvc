<?php
namespace SimpleMvc\Core;

class Request
{

    private static $instance = null;

    private $uri;

    private $controller;

    private $action;

    private $method;

    private $params = [];

    private function __construct()
    {
        $this->setUri();
        $this->setMethod();
        $this->parseUri();
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
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
            $this->controller = array_shift($parts);

            if (count($parts)) {
                $this->action = array_shift($parts);
            }
        }

        $this->params = $parts;
    }

    public function controller()
    {
        return $this->controller;
    }

    public function action()
    {
        return $this->action;
    }

    public function method()
    {
        return $this->method;
    }

    public function params()
    {
        return $this->params;
    }
}