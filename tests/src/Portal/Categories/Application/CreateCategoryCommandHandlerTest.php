<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Categories\Application;

use Myfinance\Portal\Categories\Application\CategoryCreator;
use Myfinance\Portal\Categories\Application\CreateCategoryCommandHandler;
use Myfinance\Tests\Portal\Categories\CategoriesModuleUnitTestCase;
use Myfinance\Tests\Portal\Categories\Domain\CategoryCreatedDomainEventMother;
use Myfinance\Tests\Portal\Categories\Domain\CategoryMother;

final class CreateCategoryCommandHandlerTest extends CategoriesModuleUnitTestCase
{
    private CreateCategoryCommandHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateCategoryCommandHandler(
            new CategoryCreator($this->repository(), $this->eventBus())
        );
    }

    /** @test */
    public function it_should_create_a_valid_category(): void
    {
        $command                    = CreateCategoryCommandMother::random();
        $category                   = CategoryMother::fromCommand($command);
        $categoryCreatedDomainEvent = CategoryCreatedDomainEventMother::fromCategory($category);

        $this->shouldSave($category);
        $this->shouldPublishDomainEvent($categoryCreatedDomainEvent);

        $this->handler->__invoke($command);

    }


}