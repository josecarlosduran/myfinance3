<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\Find;


use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Portal\Groups\Domain\GroupNotFound;
use Myfinance\Portal\Groups\Domain\GroupRepository;

final class GroupFinder
{

    private GroupRepository $repository;

    public function __construct(GroupRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(GroupId $id)
    {
        $response = $this->repository->search($id);

        if (null === $response) {
            throw new GroupNotFound($id->value());
        }

        return $response;

    }

}