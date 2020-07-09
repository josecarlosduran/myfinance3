<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Groups\Infrastructure\Persistence;

use Myfinance\Tests\Portal\Groups\Domain\GroupIdMother;
use Myfinance\Tests\Portal\Groups\Domain\GroupMother;
use Myfinance\Tests\Portal\Groups\GroupsModuleInfrastructureTestCase;

/**
 * @group integration
 */
final class DoctrineGroupRepositoryTest extends GroupsModuleInfrastructureTestCase
{
    /** @test */
    public function it_should_save_a_group(): void
    {
        $group = GroupMother::random();

        $this->doctrineRepository()->save($group);
        $this->clearUnitOfWork();
    }

    /** @test */
    public function it_should_return_an_existing_group(): void
    {
        $group = GroupMother::random();

        $this->doctrineRepository()->save($group);
        $this->clearUnitOfWork();

        $this->assertEquals($group, $this->doctrineRepository()->search($group->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_group(): void
    {
        $this->assertNull($this->doctrineRepository()->search(GroupIdMother::random()));
    }
}
