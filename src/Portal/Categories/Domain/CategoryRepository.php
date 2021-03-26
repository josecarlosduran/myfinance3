<?php

declare(strict_types=1);

namespace Myfinance\Portal\Categories\Domain;


use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Users\Domain\Tenant;

interface CategoryRepository
{
    public function save(Category $category): void;

    public function search(Tenant $tenant, CategoryId $id): ?Category;

    public function searchAll(Tenant $tenant): Categories;
}