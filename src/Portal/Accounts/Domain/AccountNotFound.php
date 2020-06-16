<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Shared\Domain\DomainError;

final class AccountNotFound extends DomainError
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;

        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'account-not-found';
    }

    protected function errorMessage(): string
    {
        return sprintf("The account with id %s is not found", $this->id);
    }
}