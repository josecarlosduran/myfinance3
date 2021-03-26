<?php


namespace Myfinance\Shared\Domain\Aggregate;


use Myfinance\Portal\Users\Domain\Tenant;

class MultiTenantAggregateRoot extends AggregateRoot
{

    protected Tenant $tenant;

    protected function __construct(Tenant $tenant)
    {
        $this->tenant = $tenant;
    }

    public function tenant(): Tenant
    {
        return $this->tenant;
    }

}