<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Tests\Portal\Categories\Application\CategoryCreatorTest;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class CategoriesModuleUnitTestCase extends TestCase
{
    private $repository;

    protected function shouldSave(Category $category): void
    {
        $this->repository()->method('save')->with($category);
    }

    /** @return CategoryRepository|MockObject */
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CategoryRepository::class);

    }
}