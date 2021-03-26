<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\Find;


use Myfinance\Portal\Accounts\Application\Find\FindAccountQuery;
use Myfinance\Portal\Users\Domain\UserName;
use Myfinance\Tests\Portal\Login\Domain\UsernameMother;
use Myfinance\Tests\Shared\Domain\UuidMother;

final class FindAccountQueryMother
{

    public static function create(UserName $userName, string $id): FindAccountQuery
    {
        return new FindAccountQuery($userName->value(), $id);
    }

    public static function random(): FindAccountQuery
    {
        return self::create(UsernameMother::test(), UuidMother::random());
    }


}