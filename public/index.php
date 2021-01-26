<?php

chdir(dirname(__DIR__));
require_once 'vendor/autoload.php';

use Framework\Http\RequestFactory;
use Framework\Http\Response;

### Initialization

$request = RequestFactory::fromGlobals();

### Action

$name = $request->getQueryParams()['name'] ?? 'Guest';

$response = (new Response('Hello, ' . $name . '!'))
    ->withHeader('X-Developer', 'Kyznetsov');

### Sending

header('HTTP/1.0 ' . $response->getStatusCode() . ' ' . $response->getReasonPhrase());
foreach ($response->getHeaders() as $name => $values) {
    header($name . ':' . implode(', ', $values));
}
echo $response->getBody();