<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Application\SearchAll;


use Myfinance\Portal\Categories\Application\SearchAll\SearchAllCategoryQuery;

final class SearchAllCategoriesQueryMother
{
    public static function create(): SearchAllCategoryQuery
    {
        return new SearchAllCategoryQuery();
    }

}