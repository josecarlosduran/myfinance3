<?php

declare(strict_types=1);

namespace Myfinance\Portal\Accounts\Infrastructure\Persistence;

use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Accounts\Domain\AccountRepository;
use Myfinance\Portal\Accounts\Domain\Accounts;
use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineAccountRepository extends DoctrineRepository implements AccountRepository
{
    public function save(Account $account): void
    {
        $this->persist($account);
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function search(Tenant $tenant, AccountId $id): ?Account
    {
        return $this->repository(Account::class)->findOneBy(['tenant.value' => $tenant->value(), 'id' => $id]);
    }


    public function searchAll(Tenant $tenant): Accounts
    {
        $queryResult = $this->repository(Account::class)->findBy(['tenant.value' => $tenant->value()]);
        return new Accounts($queryResult);
    }
}