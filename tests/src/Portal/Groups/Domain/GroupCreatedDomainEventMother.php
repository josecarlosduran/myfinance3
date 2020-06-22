<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups\Domain;


use Myfinance\Portal\Groups\Domain\Group;
use Myfinance\Portal\Groups\Domain\GroupCreatedDomainEvent;

final class GroupCreatedDomainEventMother
{
    public static function create(string $id, string $description, string $from, string $until): GroupCreatedDomainEvent
    {
        return new GroupCreatedDomainEvent($id, $description, $from, $until);
    }

    public static function fromGroup(Group $group)
    {
        return new GroupCreatedDomainEvent($group->id()->value(),
            $group->description()->value(),
            $group->validityInterval()->fromToHuman(),
            $group->validityInterval()->untilToHuman());
    }
}