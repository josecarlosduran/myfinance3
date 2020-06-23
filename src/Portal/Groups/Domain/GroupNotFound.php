<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Domain;


use Myfinance\Shared\Domain\DomainError;

final class GroupNotFound extends DomainError
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'group_not_found';

    }

    protected function errorMessage(): string
    {
        return sprintf('The group <%s> is not found',
            $this->id);
    }
}