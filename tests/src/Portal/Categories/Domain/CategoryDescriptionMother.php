<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Domain;


use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Tests\Shared\Domain\WordMother;

final class CategoryDescriptionMother
{
    public static function create(string $value): CategoryDescription
    {
        return new CategoryDescription($value);
    }

    public static function random(): CategoryDescription
    {
        return self::create(WordMother::random());
    }


}