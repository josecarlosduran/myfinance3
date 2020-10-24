<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\Bus\Command;


abstract class HashedUserCommand implements Command
{
    private string $hashedUser;

    public function __construct(string $hashedUser)
    {

        $this->hashedUser = $hashedUser;
    }

}