<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups\Application\Find;

use Myfinance\Portal\Groups\Application\Find\FindGroupQuery;
use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Tests\Portal\Groups\Domain\GroupIdMother;

final class FindGroupQueryMother
{
    public static function random(): FindGroupQuery
    {
        return self::create(GroupIdMother::random());
    }

    public static function create(GroupId $id): FindGroupQuery
    {
        return new FindGroupQuery($id->value());
    }
}