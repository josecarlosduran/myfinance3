<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain;


final class IncorrectAuthenticationTokenFormat extends DomainError
{

    public function errorCode(): string
    {
        return 'incorrect_authentication_token_format';
    }

    protected function errorMessage(): string
    {
        return sprintf('Then authentication token has a incorrect Format. The token needs to be composed by: Bearer <token>');
    }
}