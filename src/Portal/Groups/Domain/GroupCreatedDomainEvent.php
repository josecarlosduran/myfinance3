<?php

declare(strict_types=1);

namespace Myfinance\Portal\Groups\Domain;

use Myfinance\Shared\Domain\Bus\Event\DomainEvent;

final class GroupCreatedDomainEvent extends DomainEvent
{
    private string $description;
    private string $from;
    private string $until;

    public function __construct(
        string $id,
        string $description,
        string $from,
        string $until,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);

        $this->description = $description;
        $this->from        = $from;
        $this->until       = $until;
    }

    public static function eventName(): string
    {
        return 'group.created';
    }

    public function toPrimitives(): array
    {
        return [
            'description' => $this->description,
            'from'        => $this->from,
            'until'       => $this->until,
        ];
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['description'], $body['from'], $body['until'], $eventId, $occurredOn);
    }

    public function description(): string
    {
        return $this->description;
    }

    public function from(): string
    {
        return $this->from;
    }

    public function until(): string
    {
        return $this->until;
    }


}
