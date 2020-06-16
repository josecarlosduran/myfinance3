<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Domain\AccountIsSavingsAccount;
use Myfinance\Tests\Shared\Domain\BooleanMother;

final class AccountIsSavingsAccountMother
{
    public static function create(bool $value): AccountIsSavingsAccount
    {
        return new AccountIsSavingsAccount($value);
    }

    public static function random(): AccountIsSavingsAccount
    {
        return self::create(BooleanMother::random());
    }


}