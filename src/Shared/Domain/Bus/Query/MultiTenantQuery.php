<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\Bus\Query;



abstract class MultiTenantQuery implements Query
{
    private string $userName;

    public function __construct(string $userName)
    {
        $this->userName = $userName;
    }

    public function tenant(): string
    {
        return $this->userName;
    }

}