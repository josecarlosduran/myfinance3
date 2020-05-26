<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Domain;


use Myfinance\Portal\Categories\Application\CreateCategoryCommand;
use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;

final class CategoryMother
{
    public static function create(CategoryId $id, CategoryDescription $description): Category
    {
        return new Category($id, $description);
    }

    public static function fromCommand(CreateCategoryCommand $request): Category
    {
        return self::create(
            CategoryIdMother::create($request->id()),
            CategoryDescriptionMother::create($request->description())
        );
    }

    public static function random(): Category
    {
        return self::create(CategoryIdMother::random(), CategoryDescriptionMother::random());
    }


}