<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application\Find;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryNotFound;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Users\Domain\Tenant;

final class CategoryFinder
{

    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {

        $this->repository = $repository;
    }

    public function __invoke(Tenant $tenant, CategoryId $id): Category
    {
        $response = $this->repository->search($tenant, $id);
        if (null === $response) {
            throw new CategoryNotFound($id->value());
        }

        return $response;

    }

}