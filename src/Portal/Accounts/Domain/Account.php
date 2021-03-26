<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Shared\Domain\Aggregate\MultiTenantAggregateRoot;

final class Account extends MultiTenantAggregateRoot
{

    private AccountId               $id;
    private AccountDescription      $description;
    private AccountIban             $iban;
    private AccountIsSavingsAccount $isSavingsAccount;

    public function __construct(
        AccountId $id,
        AccountDescription $description,
        AccountIban $iban,
        AccountIsSavingsAccount $isSavingsAccount,
        Tenant $tenant
    ) {
        parent::__construct($tenant);
        $this->id               = $id;
        $this->description      = $description;
        $this->iban             = $iban;
        $this->isSavingsAccount = $isSavingsAccount;
    }

    public static function create(
        AccountId $id,
        AccountDescription $description,
        AccountIban $iban,
        AccountIsSavingsAccount $isSavingsAccount,
        Tenant $tenant
    ) {
        $account = new self($id, $description, $iban, $isSavingsAccount, $tenant);

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