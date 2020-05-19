<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Categories\Application;


use Myfinance\Portal\Categories\Application\CategoryCreator;
use Myfinance\Portal\Categories\Application\CreateCategoryRequest;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Tests\Portal\Categories\Domain\CategoryMother;
use PHPUnit\Framework\TestCase;

final class CategoryCreatorTest extends TestCase
{
    /** @test */
    public function it_should_create_a_valid_category(): void
    {
        $repository = $this->createMock(CategoryRepository::class);

        $creator = new CategoryCreator($repository);

        $category = CategoryMother::random();
        $repository->method('save')->with($category);

        $creator->__invoke(new CreateCategoryRequest($category->id()->value(), $category->description()->value()));
    }

}