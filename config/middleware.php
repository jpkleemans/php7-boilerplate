<?php
declare(strict_types = 1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return [
    function (Request $request, Response $response, callable $next) {
        $request = $request->withAttribute('request_time', time());

        return $next($request, $response);
    },
    function (Request $request, Response $response, callable $next) {
        $time = $request->getAttribute('request_time');
        $response->getBody()->write("Hello World!<br><small>Requested at: $time</small>");

        return $next($request, $response);
    },
];
