<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryNotFound;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;

final class CategoryFinder
{

    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {

        $this->repository = $repository;
    }

    public function __invoke(CategoryId $id): Category
    {
        $response = $this->repository->search($id);
        if (null === $response) {
            throw new CategoryNotFound($id->value());
        }

        return $response;

    }

}