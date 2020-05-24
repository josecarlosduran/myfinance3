<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Application;

use Myfinance\Portal\Categories\Application\CreateCategoryRequest;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Tests\Portal\Categories\Domain\CategoryIdMother;
use Myfinance\Tests\Portal\Categories\Domain\CategoryDescriptionMother;

final class CreateCategoryRequestMother
{
    public static function create(CategoryId $id, CategoryDescription $description): CreateCategoryRequest
    {
        return new CreateCategoryRequest($id->value(), $description->value());
    }

    public static function withDescriptionLongerThanMaxLength(): CreateCategoryRequest
    {
        return self::create(CategoryIdMother::random(), CategoryDescriptionMother::withLengthLongerThanMaxLength());
    }

    public static function random(): CreateCategoryRequest
    {
        return self::create(CategoryIdMother::random(), CategoryDescriptionMother::random());
    }
}