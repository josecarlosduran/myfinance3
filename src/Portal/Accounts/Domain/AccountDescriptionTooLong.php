<?php

declare(strict_types=1);

namespace Myfinance\Portal\Accounts\Domain;

use Myfinance\Shared\Domain\DomainError;

final class AccountDescriptionTooLong extends DomainError
{
    private string $description;

    public function __construct(string $description)
    {

        $this->description = $description;

        parent::__construct();

    }

    public function errorCode(): string
    {
        return 'account_description_too_long';
    }

    protected function errorMessage(): string
    {
        return sprintf('The account description <%s> is longer than %s characters',
            $this->description,
            AccountDescription::MAX_LENGTH);
    }
}
