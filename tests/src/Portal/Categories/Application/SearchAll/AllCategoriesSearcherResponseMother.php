<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Application\SearchAll;


use Myfinance\Portal\Categories\Application\SearchAll\AllCategoriesSearcherResponse;
use Myfinance\Portal\Categories\Domain\Categories;
use Myfinance\Portal\Categories\Domain\Category;
use function Lambdish\Phunctional\map;

final class AllCategoriesSearcherResponseMother
{
    public static function fromCategories(Categories $categories): AllCategoriesSearcherResponse
    {
        $elements = $categories->getIterator()->getArrayCopy();

        return new AllCategoriesSearcherResponse(map(self::toPrimitives(), $elements));
    }

    public static function empty(): AllCategoriesSearcherResponse
    {
        return new AllCategoriesSearcherResponse([]);
    }

    private static function toPrimitives()
    {
        return static function (Category $category) {
            return $category->toPrimitives();
        };
    }


}