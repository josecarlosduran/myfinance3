<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Categories\Infrastructure\Persistence;

use Myfinance\Tests\Portal\Categories\CategoriesModuleInfrastructureTestCase;
use Myfinance\Tests\Portal\Categories\Domain\CategoryIdMother;
use Myfinance\Tests\Portal\Categories\Domain\CategoryMother;
/**
 * @group integration
 */
final class DoctrineCategoryRepositoryTest extends CategoriesModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_category(): void
    {
        $category = CategoryMother::random();

        $this->doctrineRepository()->save($category);
        $this->clearUnitOfWork();
    }

    /** @test */
    public function it_should_return_an_existing_category(): void
    {
        $category = CategoryMother::random();

        $this->doctrineRepository()->save($category);
        $this->clearUnitOfWork();

        $this->assertEquals($category, $this->doctrineRepository()->search($category->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_category(): void
    {
        $this->assertNull($this->doctrineRepository()->search(CategoryIdMother::random()));
    }
}
