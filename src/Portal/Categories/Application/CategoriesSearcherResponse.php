<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application;


use Myfinance\Shared\Domain\Bus\Query\Response;

final class CategoriesSearcherResponse implements Response
{

    private array $collection;

    public function __construct($collection)
    {
        $this->collection = $collection;
    }

    public function getCollection()
    {
        return $this->collection;

    }


}