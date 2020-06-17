<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\SearchAll;


use Myfinance\Shared\Domain\Bus\Query\Response;

final class AllAccountsSearcherResponse implements Response
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