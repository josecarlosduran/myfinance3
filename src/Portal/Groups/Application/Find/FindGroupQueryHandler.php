<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\Find;

use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Shared\Domain\Bus\Query\QueryHandler;

final class FindGroupQueryHandler implements QueryHandler
{

    private GroupFinder $finder;

    public function __construct(GroupFinder $finder)
    {
        $this->finder = $finder;
    }

    public function __invoke(FindGroupQuery $query)
    {
        $id = new GroupId($query->id());

        $group = $this->finder->__invoke($id);

        return new GroupFinderResponse(
            $group->id()->value(),
            $group->description()->value(),
            $group->validityInterval()->fromToHuman(),
            $group->validityInterval()->untilToHuman(),
        );

    }


}