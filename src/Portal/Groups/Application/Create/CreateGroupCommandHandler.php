<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\Create;


use Myfinance\Portal\Groups\Domain\GroupDescription;
use Myfinance\Portal\Groups\Domain\GroupFromDate;
use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Portal\Groups\Domain\GroupUntilDate;
use Myfinance\Portal\Groups\Domain\GroupValidityInterval;
use Myfinance\Shared\Domain\Bus\Command\CommandHandler;

final class CreateGroupCommandHandler implements CommandHandler
{


    private GroupCreator $creator;

    public function __construct(GroupCreator $creator)
    {
        $this->creator = $creator;
    }


    public function __invoke(CreateGroupCommand $command)
    {

        $this->creator->__invoke(
            new GroupId($command->id()),
            new GroupDescription($command->description()),
            new GroupValidityInterval(
                new GroupFromDate($command->from()),
                new GroupUntilDate($command->until())
            )
        );


    }

}