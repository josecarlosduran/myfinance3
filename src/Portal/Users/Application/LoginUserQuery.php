<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Application;


use Myfinance\Shared\Domain\Bus\Query\Query;

final class LoginUserQuery implements Query
{


    private string $username;
    private string $password;

    public function __construct(string $username, string $password)
    {

        $this->username = $username;
        $this->password = $password;
    }

    public function username(): string
    {
        return $this->username;
    }

    public function password(): string
    {
        return $this->password;
    }


}