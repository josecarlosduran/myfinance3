<?php

declare(strict_types = 1);

namespace Myfinance\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
