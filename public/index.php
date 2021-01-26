<?php

chdir(dirname(__DIR__));
require_once 'vendor/autoload.php';

use Narrowspark\HttpEmitter\SapiEmitter;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;

### Initialization

$request = ServerRequestFactory::fromGlobals();

### Action

$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = new HtmlResponse('Hello, ' . $name . '!');

### Postprocessing

$response = $response->withHeader('X-Developer', 'ElisDN');
$emitter = new SapiEmitter();
$emitter->emit($response);