<?php

namespace Myfinance\Tests\Portal\Groups\Application\Find;

use Myfinance\Portal\Groups\Application\Find\GroupFinderResponse;
use Myfinance\Portal\Groups\Domain\Group;
use Myfinance\Tests\Portal\Groups\Domain\GroupDescriptionMother;
use Myfinance\Tests\Portal\Groups\Domain\GroupIdMother;
use Myfinance\Tests\Portal\Groups\Domain\GroupValidityIntervalMother;
use PHPUnit\Framework\TestCase;

class GroupFinderResponseMother extends TestCase
{

    public static function fromGroup(Group $group): GroupFinderResponse
    {
        return self::create($group->id()->value(),
            $group->description()->value(),
            $group->validityInterval()->fromToHuman(),
            $group->validityInterval()->untilToHuman());
    }

    public static function create(string $id, string $description, string $from, string $until): GroupFinderResponse
    {
        return new GroupFinderResponse($id, $description, $from, $until);
    }

    public static function random(): GroupFinderResponse
    {
        $validityInterval = GroupValidityIntervalMother::random();
        return self::create(GroupIdMother::random(),
            GroupDescriptionMother::random(),
            $validityInterval->fromToHuman(),
            $validityInterval->untilToHuman());
    }


}
