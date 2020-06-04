<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


use Myfinance\Shared\Domain\Aggregate\AggregateRoot;

final class Credentials extends AggregateRoot
{

    private UserName $username;
    private Password $password;

    public function __construct(UserName $username, Password $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function username(): UserName
    {
        return $this->username;
    }

    public function password(): Password
    {
        return $this->password;
    }


}