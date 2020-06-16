<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Shared\Domain\Bus\Event\DomainEvent;

final class AccountCreatedDomainEvent extends DomainEvent
{

    private string $description;
    private string $iban;
    private bool   $isSavingsAccount;

    public function __construct(
        string $id,
        string $description,
        string $iban,
        bool $isSavingsAccount,
        string $eventId = null,
        string $occurredOn = null
    ) {
        parent::__construct($id, $eventId, $occurredOn);


        $this->description      = $description;
        $this->iban             = $iban;
        $this->isSavingsAccount = $isSavingsAccount;
    }


    public static function eventName(): string
    {
        return 'account.created';
    }

    public static function fromPrimitives(
        string $aggregateId,
        array $body,
        string $eventId,
        string $occurredOn
    ): DomainEvent {
        return new self($aggregateId,
            $body['description'],
            $body['iban'],
            $body['isSavingsAccount'],
            $eventId,
            $occurredOn);
    }

    public function toPrimitives(): array
    {
        return [
            'description' => $this->description,
            'iban' => $this->iban,
            'isSavingsAccount' => $this->isSavingsAccount
        ];

    }
}