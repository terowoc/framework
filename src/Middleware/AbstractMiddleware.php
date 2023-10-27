h<?php

namespace Terowoc\Framework\Middleware;

use Terowoc\Framework\Auth\AuthInterface;
use Terowoc\Framework\Http\RedirectInterface;
use Terowoc\Framework\Http\RequestInterface;

abstract class AbstractMiddleware
{
    public function __construct(
        protected RequestInterface $request,
        protected AuthInterface $auth,
        protected RedirectInterface $redirect
    ) {
    }

    abstract public function handle(): void;
}
