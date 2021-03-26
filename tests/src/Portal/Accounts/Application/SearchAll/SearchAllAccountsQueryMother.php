<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\SearchAll;


use Myfinance\Portal\Accounts\Application\SearchAll\SearchAllAccountsQuery;
use Myfinance\Tests\Portal\Login\Domain\UsernameMother;

final class SearchAllAccountsQueryMother
{

    public static function create(): SearchAllAccountsQuery
    {
        return new SearchAllAccountsQuery(UsernameMother::test()->value());
    }


}