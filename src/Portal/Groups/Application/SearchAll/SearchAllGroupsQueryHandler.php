<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\SearchAll;


use Myfinance\Portal\Groups\Domain\Group;
use Myfinance\Shared\Domain\Bus\Query\QueryHandler;
use function Lambdish\Phunctional\map;

final class SearchAllGroupsQueryHandler implements QueryHandler
{
    private AllGroupsSearcher $searcher;

    public function __construct(AllGroupsSearcher $searcher)
    {
        $this->searcher = $searcher;
    }

    public function __invoke(SearchAllGroupsQuery $query): AllGroupsSearcherResponse
    {


        $categories = $this->searcher->__invoke();

        $elements = $categories->getIterator()->getArrayCopy();

        return new AllGroupsSearcherResponse(map($this->toPrimitives(), $elements));

    }

    private function toPrimitives()
    {
        return static function (Group $group) {
            return $group->toPrimitives();
        };
    }


}