<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\Bus\Query;


use Myfinance\Portal\Users\Domain\Tenant;

abstract class HashedUserQuery implements Query
{
    private Tenant $tenant;

    public function __construct(Tenant $tenant)
    {

        $this->tenant = $tenant;
    }

    public function hashedUser(): Tenant
    {
        return $this->tenant;
    }

}