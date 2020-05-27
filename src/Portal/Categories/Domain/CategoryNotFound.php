<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Domain;


use Myfinance\Shared\Domain\DomainError;

final class CategoryNotFound extends DomainError
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'category_not_found';

    }

    protected function errorMessage(): string
    {
        return sprintf('The category <%s> is not found',
            $this->id);
    }
}