<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Shared\Domain\Aggregate\AggregateRoot;

final class Account extends AggregateRoot
{

    private AccountId               $id;
    private AccountDescription      $description;
    private AccountIban             $iban;
    private AccountIsSavingsAccount $isSavingsAccount;

    public function __construct(
        AccountId $id,
        AccountDescription $description,
        AccountIban $iban,
        AccountIsSavingsAccount $isSavingsAccount
    ) {
        $this->id               = $id;
        $this->description      = $description;
        $this->iban             = $iban;
        $this->isSavingsAccount = $isSavingsAccount;
    }

    public static function create(
        AccountId $id,
        AccountDescription $description,
        AccountIban $iban,
        AccountIsSavingsAccount $isSavingsAccount
    ) {
        $account = new self($id, $description, $iban, $isSavingsAccount);

        $account->record(
            new AccountCreatedDomainEvent($id->value(),
                $description->value(),
                $iban->value(),
                $isSavingsAccount->value())
        );

        return $account;
    }

    public function id(): AccountId
    {
        return $this->id;
    }

    public function description(): AccountDescription
    {
        return $this->description;
    }

    public function iban(): AccountIban
    {
        return $this->iban;
    }

    public function isSavingsAccount(): AccountIsSavingsAccount
    {
        return $this->isSavingsAccount;
    }

    public function toPrimitives(): array
    {
        return
            [
                'id'             => $this->id()->value(),
                'description'    => $this->description()->value(),
                'iban'           => $this->iban()->value(),
                'savingsAccount' => $this->isSavingsAccount()->value(),

            ];
    }


}