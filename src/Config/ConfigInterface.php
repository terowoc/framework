<?php

namespace Terowoc\Framework\Config;

interface ConfigInterface
{
    public function get(string $key, $default = null): mixed;
}
