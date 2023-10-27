<?php

namespace Terowoc\Framework\View;

interface ViewInterface
{
    public function page(string $name, array $data = [], string $title = ''): void;

    public function component(string $name, array $data = []): void;

    public function title(): string;
}
