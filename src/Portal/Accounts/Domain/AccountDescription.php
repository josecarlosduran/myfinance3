<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Domain;


use Myfinance\Shared\Domain\ValueObject\StringValueObject;

final class AccountDescription extends StringValueObject
{
    public const MAX_LENGTH = 30;

    public function __construct(string $value)
    {
        $this->ensureLengthIsInferiorThanMaxLength($value);
        parent::__construct($value);
    }

    private function ensureLengthIsInferiorThanMaxLength(string $value)
    {
        if (strlen($value) > self::MAX_LENGTH) {
            throw new AccountDescriptionTooLong($value);
        }
    }

}