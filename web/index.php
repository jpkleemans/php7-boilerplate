<?php

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
 * Run application
 */
$app = $container->get(App\Application::class);
$app->run($middleware);
