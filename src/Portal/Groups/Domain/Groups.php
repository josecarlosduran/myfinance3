<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Domain;


use Myfinance\Shared\Domain\Collection;

final class Groups extends Collection
{

    protected function type(): string
    {
        return Group::class;
    }
}