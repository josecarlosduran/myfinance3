<?php

declare(strict_types=1);

namespace Myfinance\Portal\Accounts\Infrastructure\Persistence;

use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Accounts\Domain\AccountRepository;
use Myfinance\Portal\Accounts\Domain\Accounts;
use Myfinance\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineAccountRepository extends DoctrineRepository implements AccountRepository
{
    public function save(Account $account): void
    {
        $this->persist($account);
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function search(AccountId $id): ?Account
    {
        return $this->repository(Account::class)->find($id);
    }


    public function searchAll(): Accounts
    {
        $queryResult = $this->repository(Account::class)->findAll();
        return new Accounts($queryResult);
    }
}