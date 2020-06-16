<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Domain\AccountDescription;
use Myfinance\Tests\Shared\Domain\TextMother;
use Myfinance\Tests\Shared\Domain\WordMother;

final class AccountDescriptionMother
{
    private const MAX_LENGTH = 30;

    public static function create(string $value): AccountDescription
    {
        return new AccountDescription($value);
    }

    public static function withLengthLongerThanMaxLength(): AccountDescription
    {
        return self::create(TextMother::random(self::MAX_LENGTH + 1));
    }

    public static function random(): AccountDescription
    {
        return self::create(WordMother::random());
    }

}