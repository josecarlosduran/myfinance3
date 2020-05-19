<?php

namespace Myfinance\Tests\Shared\Infrastructure;

use Myfinance\Shared\Infrastructure\PhpRandomNumberGenerator;
use PHPUnit\Framework\TestCase;

class PhpRandomNumberGeneratorTest extends TestCase
{
    /** @test */
    public function it_should_generate_a_random_number()
    {
        $generator = new PhpRandomNumberGenerator();

        $this->assertIsNumeric($generator->generate());
    }

}
