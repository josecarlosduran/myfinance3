<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application\Find;


use Myfinance\Shared\Domain\Bus\Query\MultiTenantQuery;

final class FindCategoryQuery extends MultiTenantQuery
{
    private string $id;

    public function __construct(string $tenant, string $id)
    {
        parent::__construct($tenant);
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }
}