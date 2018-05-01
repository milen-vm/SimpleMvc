<?php
const DS = DIRECTORY_SEPARATOR;
const ROOT_DIR = __DIR__ . DS . '..' . DS;

require_once ROOT_DIR . 'vendor' . DS . 'autoload.php';
$config = require_once ROOT_DIR . 'config' . DS . 'config.php';

$request = new \SimpleMvc\Request();