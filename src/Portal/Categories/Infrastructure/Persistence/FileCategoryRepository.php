<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Infrastructure\Persistence;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;

final class FileCategoryRepository implements CategoryRepository
{

    const FILE_PATH = __DIR__ . '/file_repo/categories';


    public function save(Category $category): void
    {
        file_put_contents($this->fileName($category->id()->value()), serialize($category));
    }

    public function search(CategoryId $id): ?Category
    {
        return file_exists($this->fileName($id->value())) ? unserialize(file_get_contents($this->fileName($id->value()))) : null;
    }

    private function fileName(string $id): string
    {
        return sprintf('%s.%s.repo', self::FILE_PATH, $id);
    }
}