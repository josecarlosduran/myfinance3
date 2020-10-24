<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\Bus\Query;


abstract class HashedUserQuery implements Query
{
    private string $hashedUser;

    public function __construct(string $hashedUser)
    {

        $this->hashedUser = $hashedUser;
    }
}