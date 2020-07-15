<?php

namespace Myfinance\Tests\Portal\Accounts\Application\SearchAll;

use Myfinance\Portal\Accounts\Application\SearchAll\AllAccountsSearcher;
use Myfinance\Portal\Accounts\Application\SearchAll\SearchAllAccountsQueryHandler;
use Myfinance\Tests\Portal\Accounts\AccountsModuleUnitTestCase;
use Myfinance\Tests\Portal\Accounts\Domain\AccountsMother;

/**
 * @group unit
 */
class SearchAllAccountsQueryHandlerTest extends AccountsModuleUnitTestCase
{

    private SearchAllAccountsQueryHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new SearchAllAccountsQueryHandler(
            new AllAccountsSearcher($this->repository())
        );
    }

    /** @test */
    public function it_should_search_some_accounts()
    {
        $query = SearchAllAccountsQueryMother::create();

        $accounts = AccountsMother::some();

        $responseExpected = AllAccountsSearcherResponseMother::fromAccounts($accounts);

        $this->shouldSearchAllAccounts($accounts);

        $this->assertAskResponse($responseExpected, $query, $this->handler);
    }


}
