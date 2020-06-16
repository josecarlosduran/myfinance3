<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Application\Create;

use Myfinance\Portal\Categories\Application\Create\CreateCategoryCommand;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Tests\Portal\Categories\Domain\CategoryDescriptionMother;
use Myfinance\Tests\Portal\Categories\Domain\CategoryIdMother;

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