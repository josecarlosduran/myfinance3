<?php

declare(strict_types=1);

namespace Myfinance\Portal\Categories\Application;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Shared\Domain\Bus\Event\EventBus;

final class CategoryCreator
{

    private CategoryRepository $repository;
    private EventBus           $bus;

    public function __construct(CategoryRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(CreateCategoryRequest $request): void
    {
        $id          = new CategoryId($request->id());
        $description = new CategoryDescription($request->description());

        $category = Category::create($id, $description);

        $this->repository->save($category);
        $this->bus->publish(...$category->pullDomainEvents());
    }
}