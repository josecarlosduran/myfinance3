<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Domain;


use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Tests\Shared\Domain\UuidMother;

final class CategoryIdMother
{
    public static function create(string $value): CategoryId
    {
        return new CategoryId($value);
    }

    public static function random(): CategoryId
    {
        return self::create(UuidMother::random());
    }


}