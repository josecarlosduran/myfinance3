<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Find;


use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Shared\Domain\Bus\Query\QueryHandler;

final class FindAccountQueryHandler implements QueryHandler
{

    private AccountFinder $finder;

    public function __construct(AccountFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(FindAccountQuery $query)
    {
        $id = new AccountId($query->id());
        $tenant = new Tenant($query->tenant());
        $account = $this->finder->__invoke($tenant, $id);

        return new AccountFinderResponse(
            $account->id()->value(),
            $account->description()->value(),
            $account->iban()->value(),
            $account->isSavingsAccount()->value()
        );

    }


}