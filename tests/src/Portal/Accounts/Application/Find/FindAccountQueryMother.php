<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\Find;


use Myfinance\Portal\Accounts\Application\Find\FindAccountQuery;
use Myfinance\Tests\Shared\Domain\UuidMother;

final class FindAccountQueryMother
{

    public static function create(string $value): FindAccountQuery
    {
        return new FindAccountQuery($value);
    }

    public static function random(): FindAccountQuery
    {
        return self::create(UuidMother::random());
    }


}