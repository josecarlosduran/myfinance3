<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Login\Domain;


use Myfinance\Portal\Users\Domain\Password;
use Myfinance\Tests\Shared\Domain\PasswordMother as PasswordMotherShared;

final class PasswordMother
{
    public static function create(string $value): Password
    {
        return new Password($value);
    }

    public static function random(): Password
    {
        return self::create(PasswordMotherShared::random());
    }


}