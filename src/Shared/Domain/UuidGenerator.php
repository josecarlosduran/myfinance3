<?php

declare(strict_types = 1);

namespace Myfinance\Shared\Domain;

interface UuidGenerator
{
    public function generate(): string;
}
