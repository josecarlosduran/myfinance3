<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Categories\Application;

use Myfinance\Portal\Categories\Application\CategoryCreator;
use Myfinance\Portal\Categories\Application\CreateCategoryRequest;
use Myfinance\Tests\Portal\Categories\CategoriesModuleUnitTestCase;
use Myfinance\Tests\Portal\Categories\Domain\CategoryCreatedDomainEventMother;
use Myfinance\Tests\Portal\Categories\Domain\CategoryMother;

final class CategoryCreatorTest extends CategoriesModuleUnitTestCase
{
    private $creator;

    protected function setUp(): void
    {
        $this->creator = new CategoryCreator($this->repository(), $this->eventBus());
    }

    /** @test */
    public function it_should_create_a_valid_category(): void
    {
        $createCategoryRequest      = CreateCategoryRequestMother::random();
        $category                   = CategoryMother::fromRequest($createCategoryRequest);
        $categoryCreatedDomainEvent = CategoryCreatedDomainEventMother::fromCategory($category);

        $this->shouldSave($category);
        $this->shouldPublishDomainEvent($categoryCreatedDomainEvent);
        $this->creator->__invoke(new CreateCategoryRequest($category->id()->value(),
            $category->description()->value()));
    }

}