<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Domain\AccountDescription;
use Myfinance\Tests\Shared\Domain\WordMother;

final class AccountDescriptionMother
{

    public static function create(string $value): AccountDescription
    {
        return new AccountDescription($value);
    }

    public static function withLengthLongerThanMaxLength(): AccountDescription
    {
        return self::create('Test account with more than 30 characters         ');
    }

    public static function random(): AccountDescription
    {
        return self::create(WordMother::random());
    }

}