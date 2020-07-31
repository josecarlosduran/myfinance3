<?php

namespace Myfinance\Tests\Portal\Categories\Application\SearchAll;

use Myfinance\Portal\Categories\Application\SearchAll\AllCategoriesSearcher;
use Myfinance\Portal\Categories\Application\SearchAll\SearchAllCategoryQueryHandler;
use Myfinance\Tests\Portal\Categories\CategoriesModuleUnitTestCase;
use Myfinance\Tests\Portal\Categories\Domain\CategoriesMother;

/**
 * @group unit
 */
class SearchAllCategoryQueryHandlerTest extends CategoriesModuleUnitTestCase
{
    private SearchAllCategoryQueryHandler $handler;

    /** @test */
    public function it_should_search_some_accounts()
    {
        $query = SearchAllCategoriesQueryMother::create();

        $categories = CategoriesMother::some();

        $responseExpected = AllCategoriesSearcherResponseMother::fromCategories($categories);

        $this->shouldSearchAllCategories($categories);

        $this->assertAskResponse($responseExpected, $query, $this->handler);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new SearchAllCategoryQueryHandler(
            new AllCategoriesSearcher($this->repository())
        );
    }

}
