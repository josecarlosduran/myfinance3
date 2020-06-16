<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Domain\AccountIban;
use Myfinance\Tests\Shared\Domain\IbanMother;

final class AccountIbanMother
{
    public static function create(string $value): AccountIban
    {
        return new AccountIban($value);
    }

    public static function random(): AccountIban
    {
        return self::create(IbanMother::random());
    }


}