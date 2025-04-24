<?php

require_once __DIR__ . '/autoloading.php';
require_once __DIR__ . '/vendor/autoload.php';

use controllers\Router;

$request = $_SERVER['REQUEST_URI'];

// Routes
Router::route($request);
