<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\SearchAll;


use Myfinance\Portal\Accounts\Domain\AccountRepository;
use Myfinance\Portal\Users\Domain\Tenant;

final class AllAccountsSearcher
{
    private AccountRepository $repository;

    public function __construct(AccountRepository $repository)
    {

        $this->repository = $repository;
    }

    public function __invoke(Tenant $tenant)
    {
        return $this->repository->searchAll($tenant);

    }


}