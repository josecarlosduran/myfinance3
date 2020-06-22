<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups;


use Mockery\MockInterface;
use Myfinance\Portal\Groups\Domain\Group;
use Myfinance\Portal\Groups\Domain\GroupRepository;
use Myfinance\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

abstract class GroupsModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(Group $group): void
    {
        $this->repository()
             ->shouldReceive('save')
             ->once()
             ->with($this->similarTo($group))
             ->andReturnNull();
    }

    /** @return GroupRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(GroupRepository::class);

    }

    protected function shouldFind(Group $group): void
    {
        $this->repository()
             ->shouldReceive('search')
             ->once()
             ->andReturn($group);
    }

    protected function shouldSearchGroup(): void
    {
        $this->repository()
             ->shouldReceive('search')
             ->once();
    }

}