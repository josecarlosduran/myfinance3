<?php

declare(strict_types=1);

namespace Myfinance\Tests\Shared\Infrastructure\Mockery;

use Myfinance\Tests\Shared\Infrastructure\PhpUnit\Constraint\MyfinanceConstraintIsSimilar;
use Mockery\Matcher\MatcherAbstract;

final class MyfinanceMatcherIsSimilar extends MatcherAbstract
{
    private MyfinanceConstraintIsSimilar $constraint;

    public function __construct($value, $delta = 0.0)
    {
        parent::__construct($value);

        $this->constraint = new MyfinanceConstraintIsSimilar($value, $delta);
    }

    public function match(&$actual): bool
    {
        return $this->constraint->evaluate($actual, '', true);
    }

    public function __toString(): string
    {
        return 'Is similar';
    }
}
