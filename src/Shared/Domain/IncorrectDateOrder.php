<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain;


final class IncorrectDateOrder extends DomainError

{
    private string $from;
    private string $until;

    public function __construct(string $from, string $until)
    {
        $this->from  = $from;
        $this->until = $until;
        parent::__construct();

    }

    public function errorCode(): string
    {
        return 'incorrect_date_order';

    }

    protected function errorMessage(): string
    {
        return sprintf("The date order is incorrect. (%s must be greater than %s)", $this->until, $this->from);

    }
}