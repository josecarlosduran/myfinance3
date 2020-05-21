<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Shared\Domain\Bus\Event\EventBus;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class CategoriesModuleUnitTestCase extends TestCase
{
    private $repository;
    private $bus;

    protected function shouldSave(Category $category): void
    {
        $this->repository()->method('save')->withAnyParameters();
    }

    /** @return CategoryRepository|MockObject */
    protected function repository(): MockObject
    {
        return $this->repository = $this->repository ?: $this->createMock(CategoryRepository::class);

    }

    /** @return EventBus|MockObject */
    protected function eventBus(): EventBus
    {
        return $this->bus = $this->bus ?: $this->createMock(EventBus::class);

    }
}