<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\ValueObject;


use Myfinance\Shared\Domain\DomainError;

final class UuiNotValid extends DomainError
{

    private string $id;

    public function __construct(string $id)
    {

        $this->id = $id;

        parent::__construct();

    }

    public function errorCode(): string
    {
        return 'id_not_valid_uuid';
    }

    protected function errorMessage(): string
    {
        return sprintf('The id <%s> is not a valid uuid', $this->id);
    }

}