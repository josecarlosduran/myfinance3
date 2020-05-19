<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Categories\Application;


use Myfinance\Portal\Categories\Application\CategoryCreator;
use Myfinance\Portal\Categories\Application\CreateCategoryRequest;
use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Shared\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

final class CategoryCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_category(): void
    {
        $repository = $this->createMock(CategoryRepository::class);

        $creator = new CategoryCreator($repository);

        $id          = new CategoryId(Uuid::random()->value());
        $description = new CategoryDescription('some-description');

        $category = new Category($id, $description);
        $repository->method('save')->with($category);

        $creator->__invoke(new CreateCategoryRequest($id->value(), $description->value()));
    }

}