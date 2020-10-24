<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Create;


use Myfinance\Shared\Domain\Bus\Command\HashedUserCommand;

final class CreateAccountCommand extends HashedUserCommand
{

    private string $id;
    private string $description;
    private string $iban;
    private bool   $savingsAccount;

    public function __construct(string $hashedUser, string $id, string $description, string $iban, bool $savingsAccount)
    {
        parent::__construct($hashedUser);
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