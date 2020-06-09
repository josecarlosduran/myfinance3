<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories;


use Mockery\MockInterface;
use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

abstract class CategoriesModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(Category $category): void
    {
        $this->repository()
             ->shouldReceive('save')
             ->once()
             ->with($this->similarTo($category))
             ->andReturnNull();
    }

    protected function shouldFind(Category $category): void
    {
        $this->repository()
             ->shouldReceive('search')
             ->once()
             ->andReturn($category);
    }

    protected function shouldSearchCategory(): void
    {
        $this->repository()
             ->shouldReceive('search')
             ->once();
    }

    /** @return CategoryRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(CategoryRepository::class);

    }

}