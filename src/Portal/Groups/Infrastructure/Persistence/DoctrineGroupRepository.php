<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Infrastructure\Persistence;


use Myfinance\Portal\Groups\Domain\Group;
use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Portal\Groups\Domain\GroupRepository;
use Myfinance\Portal\Groups\Domain\Groups;
use Myfinance\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineGroupRepository extends DoctrineRepository implements GroupRepository
{

    public function save(Group $group): void
    {
        $this->persist($group);
    }

    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function search(GroupId $id): ?Group
    {
        return $this->repository(Group::class)->find($id);
    }

    public function searchAll(): Groups
    {
        $queryResult = $this->repository(Group::class)->findAll();
        return new Groups($queryResult);
    }
}