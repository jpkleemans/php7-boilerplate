<?php
declare(strict_types = 1);

use Interop\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Relay\RelayBuilder;
use Zend\Diactoros\Response;
use Zend\Diactoros\ServerRequestFactory;

return [
    RelayBuilder::class => function (ContainerInterface $c) {
        $resolver = function ($middleware) use ($c) {
            if (is_string($middleware)) {
                $middleware = $c->get($middleware);
            }

            return $middleware;
        };

        return new RelayBuilder($resolver);
    },
    ServerRequestInterface::class => function () {
        return ServerRequestFactory::fromGlobals();
    },
    ResponseInterface::class => function () {
        return new Response();
    },
    Response\EmitterInterface::class => function () {
        return new Response\SapiEmitter();
    },
];
