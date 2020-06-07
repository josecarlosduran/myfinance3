<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application\Find;


use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Shared\Domain\Bus\Query\QueryHandler;

final class FindCategoryQueryHandler implements QueryHandler
{

    private CategoryFinder $finder;

    public function __construct(CategoryFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(FindCategoryQuery $query)
    {
        $id = new CategoryId($query->id());

        $category = $this->finder->__invoke($id);

        return new CategoryFinderResponse(
            $category->id()->value(),
            $category->description()->value()
        );

    }


}