<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\SearchAll;


use Myfinance\Portal\Accounts\Domain\AccountRepository;

final class AllAccountsSearcher
{
    private AccountRepository $repository;

    public function __construct(AccountRepository $repository)
    {

        $this->repository = $repository;
    }

    public function __invoke()
    {
        return $this->repository->searchAll();

    }


}