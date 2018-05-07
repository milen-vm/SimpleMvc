<?php
namespace SimpleMvc\Core\Mvc;

use SimpleMvc\Core\App;

class View
{

    const DS = DS;

    const VIEWS_DIR = VIEWS_DIR;

    const FILE_EXTENSION = '.php';

    private static $app;

    private $path;

    public function __construct($model = null, $path = null)
    {
        self::$app = App::getInstance();
        $this->setPath($path);
    }

    private function setPath($path)
    {
        if ($path === null) {
            $path = self::VIEWS_DIR . $this->getDefaultPath();
        } else {
            $path = str_replace('\\', self::DS, strtolower($path));
            $path = str_replace('/', self::DS, $path);
            $path = self::VIEWS_DIR . trim($path, self::DS)  . self::FILE_EXTENSION;

            if (!file_exists($path)) {
                throw new \Exception("Template file is not found in the path {$path}");
            }
        }

        $this->path = $path;
    }

    private function getDefaultPath()
    {
        $path = self::$app->getControllerName() . self::DS .
            self::$app->getActionName() . self::FILE_EXTENSION;

        return strtolower($path);
    }

    public function render($hasLayout = true, $layout = 'default')
    {
        require_once $this->path;
    }
}