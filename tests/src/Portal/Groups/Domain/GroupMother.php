<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups\Domain;


use Myfinance\Portal\Groups\Application\Create\CreateGroupCommand;
use Myfinance\Portal\Groups\Domain\Group;
use Myfinance\Portal\Groups\Domain\GroupDescription;
use Myfinance\Portal\Groups\Domain\GroupFromDate;
use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Portal\Groups\Domain\GroupUntilDate;
use Myfinance\Portal\Groups\Domain\GroupValidityInterval;

final class GroupMother
{
    public static function fromCommand(CreateGroupCommand $command): Group
    {
        return self::create(new GroupId($command->id()),
            new GroupDescription($command->description()),
            new GroupValidityInterval(
                new GroupFromDate($command->from()),
                new GroupUntilDate($command->until())
            )

        );
    }

    public static function create(
        GroupId $id,
        GroupDescription $description,
        GroupValidityInterval $validityInterval
    ): Group {
        return new Group($id, $description, $validityInterval);
    }


    public static function withId(GroupId $groupId): Group
    {
        return self::create(
            GroupIdMother::create($groupId->value()),
            GroupDescriptionMother::random(),
            GroupValidityIntervalMother::random()
        );
    }

    public static function withValues(string $id, string $description, string $from, string $until): Group
    {
        return self::create(new GroupId($id),
            new GroupDescription($description),
            new GroupValidityInterval(
                new GroupFromDate($from),
                new GroupUntilDate($until))
        );

    }

    public static function random(): Group
    {
        return self::create(
            GroupIdMother::random(),
            GroupDescriptionMother::random(),
            GroupValidityIntervalMother::random()
        );
    }


}