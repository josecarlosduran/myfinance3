<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\SearchAll;


use Myfinance\Shared\Domain\Bus\Query\Response;

final class AllGroupsSearcherResponse implements Response
{

    private array $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;

    }


    public function toPrimitives()
    {
        return $this->collection;
    }


}