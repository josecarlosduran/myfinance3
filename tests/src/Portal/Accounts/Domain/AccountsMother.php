<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Domain;


use Myfinance\Portal\Accounts\Domain\Accounts;

final class AccountsMother
{
    public static function some(): Accounts
    {
        return self::create(random_int(1, 10));
    }

    public static function empty(): Accounts
    {
        return self::create(0);
    }

    public static function create(int $number): Accounts
    {
        $accountElements = [];

        for ($i = 0; $i <= $number; $i++) {
            $accountElements[] = AccountMother::random();

        }
        return new Accounts($accountElements);
    }


}