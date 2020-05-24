<?php

declare(strict_types = 1);

namespace Myfinance\Shared\Infrastructure\Logger;

use Monolog\Handler\StreamHandler;
use Myfinance\Shared\Domain\Logger;

final class MonologLogger implements Logger
{
    private $logger;

    public function __construct()
    {

        $this->logger = new \Monolog\Logger('test');
        $this->logger->pushHandler(new StreamHandler(__DIR__ . '/../../../../eventStore/events.log',
            \Monolog\Logger::DEBUG));
    }

    public function info(string $message, array $context = []): void
    {
        $this->logger->info($message, $context);
    }

    public function warning(string $message, array $context = []): void
    {
        $this->logger->warning($message, $context);
    }

    public function critical(string $message, array $context = []): void
    {
        $this->logger->critical($message, $context);
    }
}
