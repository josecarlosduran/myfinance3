<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\SearchAll;


use Myfinance\Portal\Groups\Domain\GroupRepository;
use Myfinance\Portal\Groups\Domain\Groups;

final class AllGroupsSearcher
{
    private GroupRepository $repository;

    public function __construct(GroupRepository $repository)
    {

        $this->repository = $repository;
    }

    public function __invoke(): Groups
    {
        return $this->repository->searchAll();
    }

}