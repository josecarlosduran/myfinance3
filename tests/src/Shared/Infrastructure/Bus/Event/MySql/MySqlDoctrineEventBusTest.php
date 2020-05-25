<?php

declare(strict_types=1);

namespace Myfinance\Tests\Shared\Infrastructure\Bus\Event\MySql;

use Myfinance\Shared\Domain\Bus\Event\DomainEvent;
use Myfinance\Shared\Infrastructure\Bus\Event\DomainEventMapping;
use Myfinance\Shared\Infrastructure\Bus\Event\MySql\MySqlDoctrineDomainEventsConsumer;
use Myfinance\Shared\Infrastructure\Bus\Event\MySql\MySqlDoctrineEventBus;
use Myfinance\Tests\Portal\Categories\Domain\CategoryCreatedDomainEventMother;
use Myfinance\Tests\Shared\Infrastructure\PhpUnit\InfrastructureTestCase;
use Doctrine\ORM\EntityManager;

final class MySqlDoctrineEventBusTest extends InfrastructureTestCase
{
    private $bus;
    private $consumer;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bus      = new MySqlDoctrineEventBus($this->service(EntityManager::class));
        $this->consumer = new MySqlDoctrineDomainEventsConsumer(
            $this->service(EntityManager::class),
            $this->service(DomainEventMapping::class)
        );
    }

    /** @test */
    public function it_should_publish_and_consume_domain_events_from_msql(): void
    {
        $domainEvent = CategoryCreatedDomainEventMother::random();

        $this->bus->publish($domainEvent);

        $this->consumer->consume(
            $this->spySubscriber($domainEvent),
            $eventsToConsume = 1
        );
    }

    private function spySubscriber(DomainEvent ...$expectedDomainEvents): callable
    {
        return function (DomainEvent $domainEvent) use ($expectedDomainEvents): void {
            $this->assertContainsEquals($domainEvent, $expectedDomainEvents);
        };
    }
}
