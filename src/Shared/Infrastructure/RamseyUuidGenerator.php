<?php

declare(strict_types = 1);

namespace Myfinance\Shared\Infrastructure;

use Myfinance\Shared\Domain\UuidGenerator;
use Ramsey\Uuid\Uuid;

final class RamseyUuidGenerator implements UuidGenerator
{
    public function generate(): string
    {
        return Uuid::uuid4()->toString();
    }
}
