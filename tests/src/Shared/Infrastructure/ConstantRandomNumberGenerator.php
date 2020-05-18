<?php

declare(strict_types = 1);

namespace Myfinance\Tests\Shared\Infrastructure;

use Myfinance\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}
