<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Find;


use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Shared\Domain\Bus\Query\HashedUserQuery;

final class FindAccountQuery extends HashedUserQuery
{
    private string $id;

    public function __construct(Tenant $tenant, string $id)
    {
        parent::__construct($tenant);
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }


}