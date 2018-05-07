<?php
define('DS', DIRECTORY_SEPARATOR);
define('ROOT_DIR', dirname(dirname(__FILE__)) . DS);
define('VIEWS_DIR', ROOT_DIR . 'src' . DS . 'Views' . DS);

require_once ROOT_DIR . 'vendor' . DS . 'autoload.php';

$configs = require_once ROOT_DIR . 'config' . DS . 'config.php';
$config = \SimpleMvc\Core\Config::getInstance($configs);

$request = \SimpleMvc\Core\Request::getInstance();

$app = \SimpleMvc\Core\App::getInstance();
$app->start($request, $config);