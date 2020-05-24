<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Domain;


use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Tests\Shared\Domain\TextMother;
use Myfinance\Tests\Shared\Domain\WordMother;

final class CategoryDescriptionMother
{
    private const MAX_LENGTH = 30;

    public static function create(string $value): CategoryDescription
    {
        return new CategoryDescription($value);
    }

    public static function withLengthLongerThanMaxLength(): CategoryDescription
    {
        return self::create(TextMother::random(self::MAX_LENGTH + 1));
    }

    public static function random(): CategoryDescription
    {
        return self::create(WordMother::random());
    }


}