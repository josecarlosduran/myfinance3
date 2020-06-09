<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Application\Find;

use Myfinance\Portal\Categories\Application\Find\FindCategoryQuery;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Tests\Portal\Categories\Domain\CategoryIdMother;

final class FindCategoryQueryMother
{
    public static function random(): FindCategoryQuery
    {
        return self::create(CategoryIdMother::random());
    }

    public static function create(CategoryId $id): FindCategoryQuery
    {
        return new FindCategoryQuery($id->value());
    }
}