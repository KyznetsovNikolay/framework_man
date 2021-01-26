<?php

chdir(dirname(__DIR__));
require_once 'vendor/autoload.php';

use Framework\Http\ResponseSender;
use Zend\Diactoros\Response\HtmlResponse;
use Zend\Diactoros\ServerRequestFactory;

### Initialization

$request = ServerRequestFactory::fromGlobals();

### Action

$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new HtmlResponse('Hello, ' . $name . '!'))
        ->withHeader('X-Developer', 'Kuznetsov Nikolay');
$emitter = new ResponseSender();
$emitter->send($response);