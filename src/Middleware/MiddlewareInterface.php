<?php

namespace Terowoc\Framework\Middleware;

interface MiddlewareInterface
{
    public function check(array $middlewares = []): void;
}
