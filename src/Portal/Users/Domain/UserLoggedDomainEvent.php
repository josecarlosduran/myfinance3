<?php

declare(strict_types=1);

namespace Myfinance\Portal\Users\Domain;

use Myfinance\Shared\Domain\Bus\Event\DomainEvent;

final class UserLoggedDomainEvent extends DomainEvent
{

    public function __construct(
        string $username,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($username, $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'user.logged';
    }

    public function toPrimitives(): array
    {
        return [];
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $eventId, $occurredOn);
    }


}
