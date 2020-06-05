<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain;


final class UserNotAuthorized extends DomainError
{

    public function errorCode(): string
    {
        return 'user_not_authorized';
    }

    protected function errorMessage(): string
    {
        return sprintf('You do not have permissions to this route');

    }
}