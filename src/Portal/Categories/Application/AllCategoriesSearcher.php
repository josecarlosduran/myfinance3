<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application;


use Myfinance\Portal\Categories\Domain\Categories;
use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryRepository;

final class AllCategoriesSearcher
{

    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {

        $this->repository = $repository;
    }

    public function __invoke(): Categories
    {
        return $this->repository->searchAll();

    }


}