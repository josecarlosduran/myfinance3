<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\SearchAll;


use Myfinance\Portal\Accounts\Application\SearchAll\AllAccountsSearcherResponse;
use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Accounts\Domain\Accounts;
use function Lambdish\Phunctional\map;

final class AllAccountsSearcherResponseMother
{

    public static function fromAccounts(Accounts $accounts): AllAccountsSearcherResponse
    {
        $elements = $accounts->getIterator()->getArrayCopy();

        return new AllAccountsSearcherResponse(map(self::toPrimitives(), $elements));
    }

    public static function empty(): AllAccountsSearcherResponse
    {
        return new AllAccountsSearcherResponse([]);
    }

    private static function toPrimitives()
    {
        return static function (Account $account) {
            return $account->toPrimitives();
        };
    }

}