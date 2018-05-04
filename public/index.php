<?php
const DS = DIRECTORY_SEPARATOR;
const ROOT_DIR = __DIR__ . DS . '..' . DS;

require_once ROOT_DIR . 'vendor' . DS . 'autoload.php';

$configs = require_once ROOT_DIR . 'config' . DS . 'config.php';
$config = \SimpleMvc\Core\Config::getInstance($configs);

$request = \SimpleMvc\Core\Request::getInstance();

$app = \SimpleMvc\Core\App::getInstance();
$app->start($request, $config);