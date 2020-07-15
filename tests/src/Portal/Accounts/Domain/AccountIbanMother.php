<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Domain\AccountIban;
use Myfinance\Tests\Shared\Domain\IbanMother;
use Myfinance\Tests\Shared\Domain\WordMother;

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

    public static function incorrect(): AccountIban
    {
        return self::create(WordMother::random());
    }


}