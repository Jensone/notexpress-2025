<?php

require_once __DIR__ . '/autoloading.php';
require_once __DIR__ . '/vendor/autoload.php';

use controllers\Router;

$request = $_SERVER['REQUEST_URI'];

include_once __DIR__ . '/views/components/header.php';

// Routes
Router::route($request);

include_once __DIR__ . '/views/components/footer.php';



