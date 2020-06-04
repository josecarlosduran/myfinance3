<?php

declare(strict_types=1);


namespace Myfinance\Portal\EventStore\Application;


use Myfinance\Portal\Categories\Domain\CategoryCreatedDomainEvent;
use Myfinance\Portal\Users\Domain\UserLoggedDomainEvent;
use Myfinance\Shared\Domain\Bus\Event\DomainEvent;
use Myfinance\Shared\Domain\Bus\Event\DomainEventSubscriber;
use Myfinance\Shared\Domain\Logger;

final class StoreEventOnAnyPortalEventOcurred implements DomainEventSubscriber

{
    private Logger $logger;

    public function __construct(Logger $logger)
    {
        $this->logger = $logger;
    }

    public static function subscribedTo(): array
    {
        return [
            CategoryCreatedDomainEvent::class,
            UserLoggedDomainEvent::class,
        ];

    }

    public function __invoke(DomainEvent $event): void
    {
        $eventData = $event->toPrimitives();
        $eventName = $event::eventName();

        $this->logger->info(sprintf('%s : %s', $eventName, json_encode($eventData)), ['EVENT', 'PORTAL']);
    }
}