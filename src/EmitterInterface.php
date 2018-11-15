<?php

namespace SuperSimpleKernel;

use Psr\Http\Message\ResponseInterface;

interface EmitterInterface
{
    public function emit(ResponseInterface $response);
}