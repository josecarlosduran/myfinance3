<?php

namespace Myfinance\Tests\Shared\Infrastructure\Logger;


use Myfinance\Shared\Infrastructure\Logger\MonologLogger;
use Myfinance\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
/**
 * @group integration
 */
class MonologLoggerTest extends InfrastructureTestCase
{
    /** @test */
    public function it_should_log_a_info_message()
    {
        $message = 'Some info message';
        $context = ['TEST'];
        $logger  = new MonologLogger();
        $logger->info($message, $context);

    }

    /** @test */
    public function it_should_log_a_critical_message()
    {
        $message = 'Some critical message';
        $context = ['TEST'];
        $logger  = new MonologLogger();
        $logger->critical($message, $context);

    }

    /** @test */
    public function it_should_log_a_warning_message()
    {
        $message = 'Some warning message';
        $context = ['TEST'];
        $logger  = new MonologLogger();
        $logger->warning($message, $context);

    }


}
