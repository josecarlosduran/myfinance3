<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\map;
use const Lambdish\Phunctional\map;

final class SearchAllCategoryQueryHandler implements QueryHandler
{

    private AllCategoriesSearcher $searcher;

    public function __construct(AllCategoriesSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllCategoryQuery $query): CategoriesSearcherResponse
    {


        $categories = $this->searcher->__invoke();

        $elements = $categories->getIterator()->getArrayCopy();

        return new CategoriesSearcherResponse(map($this->toPrimitives(), $elements));

    }

    private function toPrimitives()
    {
        return static function (Category $category) {
            return $category->toPrimitives();
        };
    }


}