<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Login\Domain;


use Myfinance\Portal\Users\Domain\UserHash;
use Myfinance\Tests\Shared\Domain\WordMother;

final class UserHashMother
{
    public static function create(string $value): UserHash
    {
        return new UserHash($value);
    }

    public static function random(): UserHash
    {
        return self::create(WordMother::random());
    }

    public static function test(): UserHash
    {
        return self::create('test-user');
    }


}