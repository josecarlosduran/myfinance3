<?php

declare(strict_types=1);

namespace Myfinance\Portal\Accounts\Domain;


interface AccountRepository
{
    public function save(Account $account): void;

    public function search(AccountId $id): ?Account;

    public function searchAll(): Accounts;
}