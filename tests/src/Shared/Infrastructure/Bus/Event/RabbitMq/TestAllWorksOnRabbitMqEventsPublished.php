<?php

declare(strict_types=1);

namespace Myfinance\Tests\Shared\Infrastructure\Bus\Event\RabbitMq;

use Myfinance\Portal\Categories\Domain\CategoryCreatedDomainEvent;
use Myfinance\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class TestAllWorksOnRabbitMqEventsPublished implements DomainEventSubscriber
{
    public static function subscribedTo(): array
    {
        return [
            CategoryCreatedDomainEvent::class
        ];
    }

    /** @param CategoryCreatedDomainEvent $event */
    public function __invoke($event)
    {
    }
}
