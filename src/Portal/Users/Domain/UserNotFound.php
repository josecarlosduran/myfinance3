<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


use Myfinance\Shared\Domain\DomainError;

final class UserNotFound extends DomainError
{

    private string $username;

    public function __construct(UserName $username)
    {
        $this->username = $username->value();
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'user-not-found';

    }

    protected function errorMessage(): string
    {
        return sprintf('The user %s is not found', $this->username);

    }
}