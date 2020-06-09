<?php

namespace Myfinance\Tests\Portal\Categories\Application\Find;

use Myfinance\Portal\Categories\Application\Find\CategoryFinder;
use Myfinance\Portal\Categories\Application\Find\FindCategoryQueryHandler;
use Myfinance\Portal\Categories\Domain\CategoryNotFound;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Tests\Portal\Categories\CategoriesModuleUnitTestCase;
use Myfinance\Tests\Portal\Categories\Domain\CategoryMother;

/**
 * @group unit
 */
class FindCategoryQueryHandlerTest extends CategoriesModuleUnitTestCase
{

    private FindCategoryQueryHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new FindCategoryQueryHandler(
            new CategoryFinder($this->repository())
        );
    }


    /** @test */
    public function it_should_find_a_category(): void
    {
        $query    = FindCategoryQueryMother::random();
        $category = CategoryMother::withId(new CategoryId($query->id()));
        $response = CategoryFinderResponseMother::fromCategory($category);

        $this->shouldFind($category);

        $this->assertAskResponse($response, $query, $this->handler);

    }

    /** @test */
    public function it_should_not_find_a_category(): void
    {
        $query = FindCategoryQueryMother::random();

        $this->shouldSearchCategory();
        $this->expectException(CategoryNotFound::class);

        $this->handler->__invoke($query);


    }


}
