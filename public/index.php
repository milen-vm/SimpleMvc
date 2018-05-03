<?php
const DS = DIRECTORY_SEPARATOR;
const ROOT_DIR = __DIR__ . DS . '..' . DS;

require_once ROOT_DIR . 'vendor' . DS . 'autoload.php';

$configs = require_once ROOT_DIR . 'config' . DS . 'config.php';
$config = \SimpleMvc\Config::getInstance($configs);

$request = \SimpleMvc\Request::getInstance();

$app = \SimpleMvc\App::getInstance();
$app->start($request, $config);