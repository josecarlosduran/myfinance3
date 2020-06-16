<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Accounts\Domain\AccountCreatedDomainEvent;
use Myfinance\Portal\Accounts\Domain\AccountDescription;
use Myfinance\Portal\Accounts\Domain\AccountIban;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Accounts\Domain\AccountIsSavingsAccount;

final class AccountCreatedDomainEventMother
{


    public static function create(
        AccountId $id,
        AccountDescription $description,
        AccountIban $iban,
        AccountIsSavingsAccount $isSavingsAccount
    ): AccountCreatedDomainEvent {
        return new AccountCreatedDomainEvent($id->value(),
            $description->value(),
            $iban->value(),
            $isSavingsAccount->value());
    }

    public static function fromAccount(Account $account)
    {
        return new AccountCreatedDomainEvent(
            $account->id()->value(),
            $account->description()->value(),
            $account->iban()->value(),
            $account->isSavingsAccount()->value());
    }

    public static function random(): AccountCreatedDomainEvent
    {
        return self::create(AccountIdMother::random(),
            AccountDescriptionMother::random(),
            AccountIbanMother::random(),
            AccountIsSavingsAccountMother::random());
    }


}