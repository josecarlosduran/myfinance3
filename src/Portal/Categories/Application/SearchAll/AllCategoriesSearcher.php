<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application\SearchAll;


use Myfinance\Portal\Categories\Domain\Categories;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Users\Domain\Tenant;

final class AllCategoriesSearcher
{

    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {

        $this->repository = $repository;
    }

    public function __invoke(Tenant $tenant): Categories
    {
        return $this->repository->searchAll($tenant);

    }


}