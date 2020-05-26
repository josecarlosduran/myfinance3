<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Application;

use Myfinance\Portal\Categories\Application\CreateCategoryCommand;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Tests\Portal\Categories\Domain\CategoryIdMother;
use Myfinance\Tests\Portal\Categories\Domain\CategoryDescriptionMother;

final class CreateCategoryCommandMother
{
    public static function create(CategoryId $id, CategoryDescription $description): CreateCategoryCommand
    {
        return new CreateCategoryCommand($id->value(), $description->value());
    }

    public static function withDescriptionLongerThanMaxLength(): CreateCategoryCommand
    {
        return self::create(CategoryIdMother::random(), CategoryDescriptionMother::withLengthLongerThanMaxLength());
    }

    public static function random(): CreateCategoryCommand
    {
        return self::create(CategoryIdMother::random(), CategoryDescriptionMother::random());
    }
}