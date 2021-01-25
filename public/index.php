<?php

chdir(dirname(__DIR__));
require_once 'vendor/autoload.php';

use Framework\Http\RequestFactory;

### Initialization

$request = RequestFactory::fromGlobals();

### Action

$name = $request->getQueryParams()['name'] ?? 'Guest';
header('X-Developer: Kyznetsov');

$name = $_GET['name'] ?? 'Guest';
echo "Hello $name";