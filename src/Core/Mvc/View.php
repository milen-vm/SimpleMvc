<?php
namespace SimpleMvc\Core\Mvc;

class View
{

    private $path;

    public function __construct($model = null, $path = null)
    {
        $this->setPath($path);
    }

    private function setPath($path)
    {
        if ($path === null) {
            $path = $this->getDefaultPath();
        }
    }

    private function getDefaultPath()
    {

    }

    public function render($hasLayout = true, $layout = 'default')
    {

    }
}