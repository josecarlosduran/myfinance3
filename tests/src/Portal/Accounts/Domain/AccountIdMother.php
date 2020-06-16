<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Tests\Shared\Domain\UuidMother;

final class AccountIdMother
{
    public static function create(string $value): AccountId
    {
        return new AccountId($value);
    }

    public static function random(): AccountId
    {
        return self::create(UuidMother::random());
    }

}