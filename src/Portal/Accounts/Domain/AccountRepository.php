<?php

declare(strict_types=1);

namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Portal\Users\Domain\Tenant;

interface AccountRepository
{
    public function save(Account $account): void;

    public function search(Tenant $tenant, AccountId $id): ?Account;

    public function searchAll(Tenant $tenant): Accounts;
}