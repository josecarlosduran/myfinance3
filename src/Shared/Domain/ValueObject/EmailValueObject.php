<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\ValueObject;


class EmailValueObject extends StringValueObject
{
    public function __construct(string $value)
    {
        $this->ensureIsAValidEmail($value);
        parent::__construct($value);
    }

    private function ensureIsAValidEmail(string $value): void
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new EmailNotValid($value);
        }
    }


}