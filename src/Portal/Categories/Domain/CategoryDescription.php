<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Domain;


use Myfinance\Shared\Domain\ValueObject\StringValueObject;

final class CategoryDescription extends StringValueObject
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
            throw new CategoryDescriptionTooLong($value);
        }
    }


}
