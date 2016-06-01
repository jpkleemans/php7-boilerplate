<?php

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
    ResponseInterface::class => DI\object(Response::class),
    Response\EmitterInterface::class => DI\object(Response\SapiEmitter::class),
];
