<?php

chdir(dirname(__DIR__));
require_once 'vendor/autoload.php';

use Framework\Http\Request;

### Initialization

$request = new Request($_GET, $_POST);

### Action

$name = $request->getQueryParams()['name'] ?? 'Guest';
header('X-Developer: Kyznetsov');

$name = $_GET['name'] ?? 'Guest';
echo "Hello $name";