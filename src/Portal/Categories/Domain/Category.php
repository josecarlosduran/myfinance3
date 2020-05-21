<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Domain;


use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Shared\Domain\Aggregate\AggregateRoot;

final class Category extends AggregateRoot
{
    private CategoryId          $id;
    private CategoryDescription $description;

    public function __construct(CategoryId $id, CategoryDescription $description)
    {
        $this->id          = $id;
        $this->description = $description;
    }

    public function id(): CategoryId
    {
        return $this->id;
    }

    public function description(): CategoryDescription
    {
        return $this->description;
    }

}