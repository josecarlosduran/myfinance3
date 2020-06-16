<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Shared\Domain\DomainError;

final class AccountIbanNotValid extends DomainError
{

    private string $iban;

    public function __construct(string $iban)
    {

        parent::__construct();

        $this->iban = $iban;
    }

    public function errorCode(): string
    {
        return 'account_iban_not_valid';

    }

    protected function errorMessage(): string
    {
        return sprintf('The iban %s is not valid ', $this->iban);

    }
}