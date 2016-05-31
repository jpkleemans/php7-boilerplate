<?php
declare(strict_types = 1);

namespace App;

use Relay\RelayBuilder;
use Zend\Diactoros\Response;
use Zend\Diactoros\Response\EmitterInterface;
use Zend\Diactoros\ServerRequestFactory;

class Application
{
    /**
     * @var RelayBuilder
     */
    private $relayBuilder;

    /**
     * @var EmitterInterface
     */
    private $emitter;

    public function __construct(RelayBuilder $relayBuilder, EmitterInterface $emitter)
    {
        $this->relayBuilder = $relayBuilder;
        $this->emitter = $emitter;
    }

    public function run($middleware = [])
    {
        // Initialize request and response
        $request = ServerRequestFactory::fromGlobals();
        $response = new Response();

        // Build application middleware pipeline
        $app = $this->relayBuilder->newInstance($middleware);

        // Run application middleware pipeline
        $response = $app($request, $response);

        // Emit response
        $this->emitter->emit($response);
    }
}
