<?php

declare(strict_types=1);

namespace Myfinance\Portal\Categories\Domain;

use Myfinance\Shared\Domain\Bus\Event\DomainEvent;

final class CategoryCreatedDomainEvent extends DomainEvent
{
    private string $description;

    public function __construct(
        string $id,
        string $description,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);

        $this->description = $description;
    }

    public static function eventName(): string
    {
        return 'category.created';
    }

    public function toPrimitives(): array
    {
        return [
            'description' => $this->description,
        ];
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId, $body['description'], $eventId, $occurredOn);
    }

    public function description(): string
    {
        return $this->description;
    }


}
