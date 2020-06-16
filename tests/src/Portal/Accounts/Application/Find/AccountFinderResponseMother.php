<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\Find;


use Myfinance\Portal\Accounts\Application\Find\AccountFinderResponse;
use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Tests\Portal\Accounts\Domain\AccountDescriptionMother;
use Myfinance\Tests\Portal\Accounts\Domain\AccountIbanMother;
use Myfinance\Tests\Portal\Accounts\Domain\AccountIdMother;
use Myfinance\Tests\Portal\Accounts\Domain\AccountIsSavingsAccountMother;

final class AccountFinderResponseMother
{
    public static function create(
        string $id,
        string $description,
        string $iban,
        bool $savingsAccount
    ): AccountFinderResponse {
        return new AccountFinderResponse($id, $description, $iban, $savingsAccount);
    }

    public static function fromAccount(Account $account): AccountFinderResponse
    {
        return self::create(
            $account->id()->value(),
            $account->description()->value(),
            $account->iban()->value(),
            $account->isSavingsAccount()->value());
    }


    public static function random(): AccountFinderResponse
    {
        return self::create(AccountIdMother::random()->value(),
            AccountDescriptionMother::random()->value(),
            AccountIbanMother::random()->value(),
            AccountIsSavingsAccountMother::random()->value());
    }


}