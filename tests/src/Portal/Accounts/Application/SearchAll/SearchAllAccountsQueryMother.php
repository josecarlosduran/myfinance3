<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\SearchAll;


use Myfinance\Portal\Accounts\Application\SearchAll\SearchAllAccountsQuery;
use Myfinance\Tests\Portal\Login\Domain\UserHashMother;

final class SearchAllAccountsQueryMother
{

    public static function create(): SearchAllAccountsQuery
    {
        $userHash = UserHashMother::test();
        return new SearchAllAccountsQuery($userHash->value());
    }


}