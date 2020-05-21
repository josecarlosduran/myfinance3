<?php

declare(strict_types=1);

namespace Myfinance\Tests\Shared\Domain;

use Myfinance\Tests\Shared\Infrastructure\Mockery\MyfinanceMatcherIsSimilar;
use Myfinance\Tests\Shared\Infrastructure\PhpUnit\Constraint\MyfinanceConstraintIsSimilar;

final class TestUtils
{
    public static function isSimilar($expected, $actual): bool
    {
        $constraint = new MyfinanceConstraintIsSimilar($expected);

        return $constraint->evaluate($actual, '', true);
    }

    public static function assertSimilar($expected, $actual): void
    {
        $constraint = new MyfinanceConstraintIsSimilar($expected);

        $constraint->evaluate($actual);
    }

    public static function similarTo($value, $delta = 0.0): MyfinanceMatcherIsSimilar
    {
        return new MyfinanceMatcherIsSimilar($value, $delta);
    }
}
