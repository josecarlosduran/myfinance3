<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Domain;


use Myfinance\Shared\Domain\Collection;

final class Categories extends Collection
{

    protected function type(): string
    {
        return Category::class;
    }
}