<?php

namespace Myfinance\Tests\Portal\Accounts\Application\Find;

use Myfinance\Portal\Accounts\Application\Find\AccountFinder;
use Myfinance\Portal\Accounts\Application\Find\FindAccountQueryHandler;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Tests\Portal\Accounts\AccountsModuleUnitTestCase;
use Myfinance\Tests\Portal\Accounts\Domain\AccountMother;

/**
 * @group unit
 */
class FindAccountQueryHandlerTest extends AccountsModuleUnitTestCase
{


    private FindAccountQueryHandler $handler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new FindAccountQueryHandler(
            new AccountFinder($this->repository())
        );
    }


    /** @test */
    public function it_should_find_an_account(): void
    {
        $query   = FindAccountQueryMother::random();
        $account = AccountMother::withId(new AccountId($query->id()));


        $response = AccountFinderResponseMother::fromAccount($account);

        $this->shouldFind($account);

        $this->assertAskResponse($response, $query, $this->handler);

    }
}
