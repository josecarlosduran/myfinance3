<?php

declare(strict_types=1);

namespace Myfinance\Portal\Users\Domain;

use Myfinance\Shared\Domain\Bus\Event\DomainEvent;

final class UserLoggedDomainEvent extends DomainEvent
{

    private string $username;

    public function __construct(
        string $username,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($username, $eventId, $occurredOn);
        $this->username = $username;
    }

    public static function eventName(): string
    {
        return 'user.logged';
    }

    public function toPrimitives(): array
    {
        return [
            'username' => $this->username
        ];
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
