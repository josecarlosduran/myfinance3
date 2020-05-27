<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application;


use Myfinance\Shared\Domain\Bus\Query\Response;

final class CategoryFinderResponse implements Response
{

    private string $id;
    private string $description;

    public function __construct(string $id, string $description)
    {
        $this->id          = $id;
        $this->description = $description;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function description(): string
    {
        return $this->description;
    }


}