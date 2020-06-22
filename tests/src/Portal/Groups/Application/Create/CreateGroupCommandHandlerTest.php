<?php

namespace Myfinance\Tests\Portal\Groups\Application\Create;

use Myfinance\Portal\Groups\Application\Create\CreateGroupCommandHandler;
use Myfinance\Portal\Groups\Application\Create\GroupCreator;
use Myfinance\Tests\Portal\Groups\Domain\GroupCreatedDomainEventMother;
use Myfinance\Tests\Portal\Groups\Domain\GroupMother;
use Myfinance\Tests\Portal\Groups\GroupsModuleUnitTestCase;

class CreateGroupCommandHandlerTest extends GroupsModuleUnitTestCase
{

    private CreateGroupCommandHandler $handler;

    /** @test */
    public function it_should_create_a_valid_account(): void
    {
        $command                 = CreateGroupCommandMother::random();
        $group                   = GroupMother::fromCommand($command);
        $groupCreatedDomainEvent = GroupCreatedDomainEventMother::fromGroup($group);

        $this->shouldSave($group);
        $this->shouldPublishDomainEvent($groupCreatedDomainEvent);

        $this->handler->__invoke($command);

    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new CreateGroupCommandHandler(
            new GroupCreator($this->repository(), $this->eventBus())
        );
    }

}
