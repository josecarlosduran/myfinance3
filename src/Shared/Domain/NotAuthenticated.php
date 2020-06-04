<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain;


final class NotAuthenticated extends DomainError
{

    public function errorCode(): string
    {
        return 'not_authenticated';
    }

    protected function errorMessage(): string
    {
        return sprintf('The method you are trying to access needs to be authenticated.');
    }
}