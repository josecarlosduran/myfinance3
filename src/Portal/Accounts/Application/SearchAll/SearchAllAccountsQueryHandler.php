<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\SearchAll;


use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\map;

final class SearchAllAccountsQueryHandler implements QueryHandler
{
    private AllAccountsSearcher $searcher;

    public function __construct(AllAccountsSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllAccountsQuery $query): AllAccountsSearcherResponse
    {
        $tenant = new Tenant($query->tenant());
        $accounts = $this->searcher->__invoke($tenant);
        $elements = $accounts->getIterator()->getArrayCopy();

        return new AllAccountsSearcherResponse(map($this->toPrimitives(), $elements));

    }

    private function toPrimitives()
    {
        return static function (Account $account) {
            return $account->toPrimitives();
        };
    }

}