<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


use Myfinance\Shared\Domain\ValueObject\StringValueObject;

final class UserHash extends StringValueObject
{
    public function __construct(string $value)
    {

        $valueHashed = $this->generateHashValue($value);

        parent::__construct($valueHashed);

    }

    private function generateHashValue(string $value): string
    {
        return sha1($value);
    }

}