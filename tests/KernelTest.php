<?php

use PHPUnit\Framework\TestCase;
use SuperSimpleKernel\Kernel;
use SuperSimpleKernel\EmitterInterface;
use SuperSimpleKernel\RouterInterface;

class KernelTest extends TestCase
{
    public function testItInitializes()
    {
        $emitter = $this->createMock(EmitterInterface::class);
        $router = $this->createMock(RouterInterface::class);
        $this->assertInstanceOf(
            Kernel::class,
            new Kernel($router, $emitter)
        );
    }

    public function testItRuns()
    {
        $emitter = $this->createMock(EmitterInterface::class);
        $router = $this->createMock(RouterInterface::class);
        $handler = $this->createMock(\Psr\Http\Server\RequestHandlerInterface::class);
        $response = $this->createMock(\Psr\Http\Message\ResponseInterface::class);
        $request = $this->createMock(\Psr\Http\Message\ServerRequestInterface::class);
        $uri = $this->createMock(\Psr\Http\Message\UriInterface::class);
        $handler->method("handle")->willReturn($response);
        $router->method("getHandler")->willReturn($handler);
        $request->method("getUri")->willReturn($uri);
        $request->method("getMethod")->willReturn("GET");

        $kernel = new Kernel($router, $emitter);
        $this->assertNull($kernel->run($request));
    }
}