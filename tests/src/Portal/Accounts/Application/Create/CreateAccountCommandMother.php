<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\Create;

use Myfinance\Portal\Accounts\Application\Create\CreateAccountCommand;
use Myfinance\Portal\Accounts\Domain\AccountDescription;
use Myfinance\Portal\Accounts\Domain\AccountIban;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Accounts\Domain\AccountIsSavingsAccount;
use Myfinance\Tests\Portal\Accounts\Domain\AccountDescriptionMother;
use Myfinance\Tests\Portal\Accounts\Domain\AccountIbanMother;
use Myfinance\Tests\Portal\Accounts\Domain\AccountIdMother;
use Myfinance\Tests\Portal\Accounts\Domain\AccountIsSavingsAccountMother;

final class CreateAccountCommandMother
{
    public static function withDescriptionLongerThanMaxLength(): CreateAccountCommand
    {
        return self::create(AccountIdMother::random(),
            AccountDescriptionMother::withLengthLongerThanMaxLength(),
            AccountIbanMother::random(),
            AccountIsSavingsAccountMother::random());
    }

    public static function create(
        AccountId $id,
        AccountDescription $description,
        AccountIban $iban,
        AccountIsSavingsAccount $isSavingsAccount
    ): CreateAccountCommand {
        return new CreateAccountCommand($id->value(),
            $description->value(),
            $iban->value(),
            $isSavingsAccount->value());
    }

    public static function random(): CreateAccountCommand
    {
        return self::create(AccountIdMother::random(),
            AccountDescriptionMother::random(),
            AccountIbanMother::random(),
            AccountIsSavingsAccountMother::random());
    }

    public static function withIncorrectIban(): CreateAccountCommand
    {
        return self::create(AccountIdMother::random(),
            AccountDescriptionMother::random(),
            AccountIbanMother::incorrect(),
            AccountIsSavingsAccountMother::random());
    }
}