<?php

namespace Myfinance\Tests\Portal\Groups\Application\Find;

use Myfinance\Portal\Groups\Application\Find\FindGroupQueryHandler;
use Myfinance\Portal\Groups\Application\Find\GroupFinder;
use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Portal\Groups\Domain\GroupNotFound;
use Myfinance\Tests\Portal\Groups\Domain\GroupMother;
use Myfinance\Tests\Portal\Groups\GroupsModuleUnitTestCase;

/**
 * @group unit
 */
class FindGroupQueryHandlerTest extends GroupsModuleUnitTestCase
{

    private FindGroupQueryHandler $handler;

    /** @test */
    public function it_should_find_a_group(): void
    {
        $query    = FindGroupQueryMother::random();
        $group    = GroupMother::withId(new GroupId($query->id()));
        $response = GroupFinderResponseMother::fromGroup($group);

        $this->shouldFind($group);

        $this->assertAskResponse($response, $query, $this->handler);

    }

    /** @test */
    public function it_should_not_find_a_group(): void
    {
        $query = FindGroupQueryMother::random();

        $this->shouldSearchGroup();
        $this->expectException(GroupNotFound::class);

        $this->handler->__invoke($query);


    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new FindGroupQueryHandler(
            new GroupFinder($this->repository())
        );
    }


}
