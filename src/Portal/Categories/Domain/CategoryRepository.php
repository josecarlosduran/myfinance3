<?php

declare(strict_types=1);

namespace Myfinance\Portal\Categories\Domain;


use Myfinance\Portal\Shared\Domain\Category\CategoryId;

interface CategoryRepository
{
    public function save(Category $category): void;

    public function search(CategoryId $id): ?Category;

    public function searchAll(): Categories;
}