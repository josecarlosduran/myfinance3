<?php

namespace Myfinance\Tests\Portal\Categories\Application\Find;

use Myfinance\Portal\Categories\Application\Find\CategoryFinderResponse;
use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Tests\Portal\Categories\Domain\CategoryDescriptionMother;
use Myfinance\Tests\Shared\Domain\UuidMother;
use PHPUnit\Framework\TestCase;

class CategoryFinderResponseMother extends TestCase
{

    public static function create(string $id, string $description): CategoryFinderResponse
    {
        return new CategoryFinderResponse($id, $description);
    }

    public static function fromCategory(Category $category): CategoryFinderResponse
    {
        return self::create($category->id()->value(), $category->description()->value());
    }

    public static function random(): CategoryFinderResponse
    {
        return self::create(UuidMother::random(), CategoryDescriptionMother::random());
    }


}
