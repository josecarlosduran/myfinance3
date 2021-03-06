<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Find;


use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Accounts\Domain\AccountNotFound;
use Myfinance\Portal\Accounts\Domain\AccountRepository;
use Myfinance\Portal\Users\Domain\Tenant;

final class AccountFinder
{
    private AccountRepository $repository;

    public function __construct(AccountRepository $repository)
    {
        $this->repository = $repository;
    }


    public function __invoke(Tenant $tenant, AccountId $accountId): Account
    {
        $response = $this->repository->search($tenant, $accountId);
        if (null === $response) {
            throw new AccountNotFound($accountId->value());
        }

        return $response;

    }

}