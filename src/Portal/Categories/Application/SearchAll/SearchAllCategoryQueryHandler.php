<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application\SearchAll;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\map;

final class SearchAllCategoryQueryHandler implements QueryHandler
{

    private AllCategoriesSearcher $searcher;

    public function __construct(AllCategoriesSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllCategoryQuery $query): AllCategoriesSearcherResponse
    {
        $tenant = new Tenant($query->tenant());

        $categories = $this->searcher->__invoke($tenant);

        $elements = $categories->getIterator()->getArrayCopy();

        return new AllCategoriesSearcherResponse(map($this->toPrimitives(), $elements));

    }

    private function toPrimitives()
    {
        return static function (Category $category) {
            return $category->toPrimitives();
        };
    }


}