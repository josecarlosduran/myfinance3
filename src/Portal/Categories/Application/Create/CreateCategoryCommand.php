<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application\Create;


use Myfinance\Shared\Domain\Bus\Command\MultiTenantCommand;

final class CreateCategoryCommand extends MultiTenantCommand
{

    private string $id;
    private string $description;

    public function __construct(string $tenant, string $id, string $description)
    {
        parent::__construct($tenant);
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