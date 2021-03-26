<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Application\Find;

use Myfinance\Portal\Categories\Application\Find\FindCategoryQuery;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Users\Domain\UserName;
use Myfinance\Tests\Portal\Categories\Domain\CategoryIdMother;
use Myfinance\Tests\Portal\Login\Domain\UsernameMother;

final class FindCategoryQueryMother
{
    public static function random(): FindCategoryQuery
    {
        return self::create(UsernameMother::test(), CategoryIdMother::random());
    }

    public static function create(UserName $userName, CategoryId $id): FindCategoryQuery
    {
        return new FindCategoryQuery($userName->value(), $id->value());
    }
}