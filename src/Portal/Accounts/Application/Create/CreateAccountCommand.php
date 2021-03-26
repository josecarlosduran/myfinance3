<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Create;


use Myfinance\Shared\Domain\Bus\Command\MultiTenantCommand;

final class CreateAccountCommand extends MultiTenantCommand
{

    private string $id;
    private string $description;
    private string $iban;
    private bool   $savingsAccount;

    public function __construct(string $userName, string $id, string $description, string $iban, bool $savingsAccount)
    {
        parent::__construct($userName);
        $this->id             = $id;
        $this->description    = $description;
        $this->iban           = $iban;
        $this->savingsAccount = $savingsAccount;
    }

    public function id(): string
    {
        return $this->id;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function iban(): string
    {
        return $this->iban;
    }

    public function savingsAccount(): bool
    {
        return $this->savingsAccount;
    }


}