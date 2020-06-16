<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Application\Create\CreateAccountCommand;
use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Accounts\Domain\AccountDescription;
use Myfinance\Portal\Accounts\Domain\AccountIban;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Accounts\Domain\AccountIsSavingsAccount;

final class AccountMother
{


    public static function withValues(string $id, string $description, string $iban, string $isSavingsAccount): Account
    {
        return self::create(new AccountId($id),
            new AccountDescription($description),
            new AccountIban($iban),
            new AccountIsSavingsAccount((bool)$isSavingsAccount));
    }

    public static function create(
        AccountId $id,
        AccountDescription $description,
        AccountIban $iban,
        AccountIsSavingsAccount $isSavingsAccount
    ): Account {
        return new Account($id, $description, $iban, $isSavingsAccount);
    }

    public static function withId(AccountId $id): Account
    {
        return self::create(AccountIdMother::create($id->value()),
            AccountDescriptionMother::random(),
            AccountIbanMother::random(),
            AccountIsSavingsAccountMother::random());
    }

    public static function fromCommand(CreateAccountCommand $command)
    {
        return self::create(new AccountId($command->id()),
            new AccountDescription($command->description()),
            new AccountIban($command->iban()),
            new AccountIsSavingsAccount($command->savingsAccount()));
    }

    public static function random(): Account
    {
        return self::create(AccountIdMother::random(),
            AccountDescriptionMother::random(),
            AccountIbanMother::random(),
            AccountIsSavingsAccountMother::random());
    }


}