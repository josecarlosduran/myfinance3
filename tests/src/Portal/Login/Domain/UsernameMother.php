<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Login\Domain;


use Myfinance\Portal\Users\Domain\UserName;
use Myfinance\Tests\Shared\Domain\WordMother;

final class UsernameMother
{
    public static function create(string $value): Username
    {
        return new Username($value);
    }

    public static function random(): Username
    {
        return self::create(WordMother::random());
    }

    public static function test(): Username
    {
        return self::create('test-user');
    }


}