<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Application\Create;


use Myfinance\Shared\Domain\Bus\Command\Command;

final class CreateGroupCommand implements Command
{
    private string $id;
    private string $description;
    private string $from;
    private string $until;

    public function __construct(string $id, string $description, string $from, string $until)
    {


        $this->id          = $id;
        $this->description = $description;
        $this->from        = $from;
        $this->until       = $until;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function from(): string
    {
        return $this->from;
    }

    public function until(): string
    {
        return $this->until;
    }


}