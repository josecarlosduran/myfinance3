<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\Bus\Command;


abstract class AuthenticatedUserCommand implements Command
{
    private string $userName;

    public function __construct(string $userName)
    {

        $this->userName = $userName;
    }

    public function user(): string
    {
        return $this->userName;
    }


}