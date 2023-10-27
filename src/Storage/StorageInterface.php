<?php

namespace Terowoc\Framework\Storage;

interface StorageInterface
{
    public function url(string $path): string;

    public function get(string $path): string;
}
