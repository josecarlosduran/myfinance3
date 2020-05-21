<?php

declare(strict_types=1);

namespace Myfinance\Tests\Shared\Infrastructure\PhpUnit;

use Myfinance\Tests\Shared\Domain\TestUtils;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;

abstract class InfrastructureTestCase extends KernelTestCase
{
    protected function setUp(): void
    {
        self::bootKernel(['environment' => 'test']);

        parent::setUp();
    }

    protected function assertSimilar($expected, $actual): void
    {
        TestUtils::assertSimilar($expected, $actual);
    }

    /** @return mixed */
    protected function service($id)
    {
        return self::$container->get($id);
    }

    /** @return mixed */
    protected function parameter($parameter)
    {
        return self::$container->getParameter($parameter);
    }
}
