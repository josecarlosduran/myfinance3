<?php

declare(strict_types=1);

namespace Myfinance\Portal\Categories\Application\Create;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Users\Domain\Tenant;
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

    public function __invoke(Tenant $tenant, CategoryId $id, CategoryDescription $description): void
    {

        $category = Category::create($id, $description, $tenant);

        $this->repository->save($category);
        $this->bus->publish(...$category->pullDomainEvents());
    }
}