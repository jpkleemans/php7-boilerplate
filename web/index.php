<?php
declare(strict_types = 1);

require __DIR__ . '/../vendor/autoload.php';

/*
 * Load configuration
 */
$configPath = __DIR__ . '/../config';
$services = require $configPath . '/services.php';
$middleware = require $configPath . '/middleware.php';

/*
 * Build container
 */
$containerBuilder = new DI\ContainerBuilder();
$containerBuilder->addDefinitions($services);
$container = $containerBuilder->build();

/*
 * Build application middleware pipeline
 */
$relayBuilder = $container->get(Relay\RelayBuilder::class);
$app = $relayBuilder->newInstance($middleware);

/*
 * Run application middleware pipeline
 */
$request = $container->get(Psr\Http\Message\ServerRequestInterface::class);
$response = $container->get(Psr\Http\Message\ResponseInterface::class);
$response = $app($request, $response);

/*
 * Emit response
 */
$emitter = $container->get(Zend\Diactoros\Response\EmitterInterface::class);
$emitter->emit($response);
