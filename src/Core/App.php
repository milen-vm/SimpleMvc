<?php
namespace SimpleMvc\Core;

class App
{

    const CONTROLLERS_NAMESPACE = '\\SimpleMvc\\Controllers\\';

    const CONTROLLERS_SUFFIX = 'Controller';

    private static $instance = null;

    private $controller;

    private $action;

    /**
     * @var \SimpleMvc\Core\Request
     */
    private $request;

    /**
     * @var \SimpleMvc\Core\Config
     */
    private static $configs;

    private function __construct()
    {
    }

    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self();
        }

        return self::$instance;
    }

    /**
     * @param Request $request
     * @param Config $config
     * @throws \Exception
     */
    public function start(Request $request, Config $config)
    {
        $this->request = $request;
        self::$configs = $config;

        $this->setController();
        $this->setAction();

        call_user_func_array([
            $this->controller,
            $this->action],
            $this->request->params()
        );
    }

    private function setController()
    {
        if ($this->request->controller() === null) {
            $name = self::$configs->get('uri.controller');
        } else {
            $name = $this->request->controller();
        }

        $class = self::CONTROLLERS_NAMESPACE .
            ucfirst(strtolower($name)) .
            self::CONTROLLERS_SUFFIX;

        if (!class_exists($class)) {
            throw new \Exception("Controller '{$name}' does not exists.");
        }

        $this->controller = new $class();
    }

    private function setAction()
    {
        if ($this->request->action() === null) {
            $action = self::$configs->get('uri.action');
        } else {
            $action = strtolower($this->request->action());
        }

        if (!method_exists($this->controller, $action)) {
            throw new \Exception('The method ' . $action .' in class '
                . get_class($this->controller) . ' does not exists.');
        }

        $this->action = $action;
    }

    public static function config($config)
    {
        if (self::$configs === null) {
            throw new \Exception('App is not started.');
        }
        
        return self::$configs->get($config);
    }
}