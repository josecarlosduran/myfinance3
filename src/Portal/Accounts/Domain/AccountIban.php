<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Shared\Domain\Utils;
use Myfinance\Shared\Domain\ValueObject\StringValueObject;

final class AccountIban extends StringValueObject
{

    public function __construct(string $value)
    {
        $this->ensureIsAValidIban($value);
        parent::__construct($value);
    }

    private function ensureIsAValidIban(string $value)
    {
        if (Utils::checkIBAN($value) == false) {
            throw new AccountIbanNotValid($value);
        }
    }

}