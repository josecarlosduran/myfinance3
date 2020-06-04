<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


use Myfinance\Shared\Domain\DomainError;

final class PasswordMismatch extends DomainError
{
    private string $username;

    public function __construct(UserName $username)
    {
        $this->username = $username->value();
        parent::__construct();

    }

    public function errorCode(): string
    {
        return 'password-mismatch';
    }

    protected function errorMessage(): string
    {
        return sprintf('The password for user %s is incorrect', $this->username);

    }
}