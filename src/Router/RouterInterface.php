<?php

namespace Terowoc\Framework\Router;

interface RouterInterface
{
    public function dispatch(string $uri, string $method): void;
}
