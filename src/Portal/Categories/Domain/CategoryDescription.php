<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Domain;


use InvalidArgumentException;
use Myfinance\Shared\Domain\ValueObject\StringValueObject;

final class CategoryDescription extends StringValueObject
{
    private const MAX_LENGTH = 30;

    public function __construct(string $value)
    {
        $this->ensureLengthIsInferiorThanMaxLength($value);
        parent::__construct($value);
    }

    private function ensureLengthIsInferiorThanMaxLength(string $value)
    {
        if (strlen($value) > self::MAX_LENGTH) {
            throw new InvalidArgumentException(sprintf("The Category Description has more than %s characters",
                self::MAX_LENGTH));
        }
    }


}