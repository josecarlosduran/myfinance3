<?php

declare(strict_types=1);

namespace Myfinance\Portal\Categories\Infrastructure\Persistence;

use Myfinance\Portal\Categories\Domain\Categories;
use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineCategoryRepository extends DoctrineRepository implements CategoryRepository
{
    public function save(Category $category): void
    {
        $this->persist($category);
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function search(Tenant $tenant, CategoryId $id): ?Category
    {
        return $this->repository(Category::class)->findOneBy(['tenant.value' => $tenant->value(), 'id' => $id]);
    }


    public function searchAll(Tenant $tenant): Categories
    {
        $queryResult = $this->repository(Category::class)->findBy(['tenant.value' => $tenant->value()]);
        return new Categories($queryResult);
    }
}