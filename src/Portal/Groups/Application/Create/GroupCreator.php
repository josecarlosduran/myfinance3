<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\Create;


use Myfinance\Portal\Groups\Domain\Group;
use Myfinance\Portal\Groups\Domain\GroupDescription;
use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Portal\Groups\Domain\GroupRepository;
use Myfinance\Portal\Groups\Domain\GroupValidityInterval;
use Myfinance\Shared\Domain\Bus\Event\EventBus;

final class GroupCreator
{
    private GroupRepository $repository;
    private EventBus        $bus;

    public function __construct(GroupRepository $repository, EventBus $bus)
    {

        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(GroupId $id, GroupDescription $description, GroupValidityInterval $validityInterval)
    {
        $group = Group::create($id, $description, $validityInterval);

        $this->repository->save($group);
        $this->bus->publish(...$group->pullDomainEvents());

    }

}