<?php

namespace SuperSimpleKernel;

use Psr\Http\Message\ServerRequestInterface;

class Kernel
{
    private $router;
    private $emitter;

    function __construct(RouterInterface $router, EmitterInterface $emitter) {
        $this->router = $router;
        $this->emitter = $emitter;
    }

    function run(ServerRequestInterface $request)
    {
        $handler = $this->router->getHandler($request->getMethod(), $request->getUri());
        $this->emitter->emit($handler->handle($request));
    }
}