<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\Find;


use Myfinance\Shared\Domain\Bus\Query\Query;

final class FindGroupQuery implements Query
{
    private string $id;

    public function __construct(string $id)
    {
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }


}