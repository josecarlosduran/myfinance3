<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\Find;


use Myfinance\Portal\Accounts\Application\Find\FindAccountQuery;
use Myfinance\Portal\Users\Domain\UserHash;
use Myfinance\Tests\Portal\Login\Domain\UserHashMother;
use Myfinance\Tests\Shared\Domain\UuidMother;

final class FindAccountQueryMother
{

    public static function create(UserHash $userHash, string $id): FindAccountQuery
    {
        return new FindAccountQuery($userHash->value(), $id);
    }

    public static function random(): FindAccountQuery
    {
        return self::create(UserHashMother::test(), UuidMother::random());
    }


}