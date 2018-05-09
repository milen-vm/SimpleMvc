<?php
use MyMVC\Library\Config;
use MyMVC\Library\MVC\View;
use MyMVC\Library\Utility\Session;
use MyMVC\Library\Utility\Storage;
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet"
          href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
          integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7"
          crossorigin="anonymous">
    <!-- Optional theme -->
    <link rel="stylesheet"
          href="https://bootswatch.com/superhero/bootstrap.min.css">
    <!-- My css -->
    <link rel="stylesheet" href="<?php echo LINK_PREFIX; ?>/public/css/styles.css">
    <script src="http://code.jquery.com/jquery-2.2.0.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"
            integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS"
            crossorigin="anonymous"></script>
    <title>></title>
</head>
<body>
<nav class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">
                <img alt="Brand" src="...">
            </a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li>Test</li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li>test</li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>
<div class="container">