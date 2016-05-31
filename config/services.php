<?php

use Interop\Container\ContainerInterface;
use Relay\RelayBuilder;
use Zend\Diactoros\Response\EmitterInterface;
use Zend\Diactoros\Response\SapiEmitter;

return [
    RelayBuilder::class => function (ContainerInterface $c) {
        $resolver = function ($class) use ($c) {
            return $c->get($class);
        };

        $relayBuilder = new RelayBuilder($resolver);

        return $relayBuilder;
    },
    EmitterInterface::class => DI\object(SapiEmitter::class),
];
