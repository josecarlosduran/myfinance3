<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\ValueObject;


use Myfinance\Shared\Domain\DomainError;

final class EmailNotValid extends DomainError
{
    private string $email;

    public function __construct(string $email)
    {
        parent::__construct();
        $this->email = $email;
    }

    public function errorCode(): string
    {
        return 'email_not_valid';
    }

    protected function errorMessage(): string
    {
        return sprintf("%s is not a valid email", $this->email);
    }
}