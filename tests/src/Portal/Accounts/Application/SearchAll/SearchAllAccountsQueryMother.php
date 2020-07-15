<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\SearchAll;


use Myfinance\Portal\Accounts\Application\SearchAll\SearchAllAccountsQuery;

final class SearchAllAccountsQueryMother
{

    public static function create(): SearchAllAccountsQuery
    {
        return new SearchAllAccountsQuery();
    }


}