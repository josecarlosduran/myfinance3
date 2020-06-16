<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Shared\Domain\Collection;

final class Accounts extends Collection
{

    protected function type(): string
    {
        return Account::class;

    }
}