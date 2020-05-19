<?php

declare(strict_types=1);

namespace Myfinance\Portal\Categories\Application;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;

final class CategoryCreator
{

    private CategoryRepository $repository;

    public function __construct(CategoryRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(CreateCategoryRequest $request): void
    {
        $id          = new CategoryId($request->id());
        $description = new CategoryDescription($request->description());

        $category = new Category($id, $description);

        $this->repository->save($category);
    }
}