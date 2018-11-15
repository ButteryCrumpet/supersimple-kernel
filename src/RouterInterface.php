<?php

namespace SuperSimpleKernel;

use Psr\Http\Message\UriInterface;
use Psr\Http\Server\RequestHandlerInterface;

interface RouterInterface
{
    function getHandler(string $method, UriInterface $uri): RequestHandlerInterface;
}