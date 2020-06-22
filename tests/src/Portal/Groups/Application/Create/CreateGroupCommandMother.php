<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups\Application\Create;


use Myfinance\Portal\Groups\Application\Create\CreateGroupCommand;
use Myfinance\Portal\Groups\Domain\GroupDescription;
use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Portal\Groups\Domain\GroupValidityInterval;
use Myfinance\Tests\Portal\Groups\Domain\GroupDescriptionMother;
use Myfinance\Tests\Portal\Groups\Domain\GroupIdMother;
use Myfinance\Tests\Portal\Groups\Domain\GroupValidityIntervalMother;

final class CreateGroupCommandMother
{

    public static function random(): CreateGroupCommand
    {
        return self::create(GroupIdMother::random(),
            GroupDescriptionMother::random(),
            GroupValidityIntervalMother::random());
    }

    public static function create(
        GroupId $id,
        GroupDescription $description,
        GroupValidityInterval $validity
    ): CreateGroupCommand {
        return new CreateGroupCommand($id->value(),
            $description->value(),
            $validity->fromToHuman(),
            $validity->untilToHuman());
    }


}