<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Find;


use Myfinance\Shared\Domain\Bus\Query\Response;

final class AccountFinderResponse implements Response
{

    private string $id;
    private string $description;
    private string $iban;
    private bool   $savingsAccount;

    public function __construct(string $id, string $description, string $iban, bool $savingsAccount)
    {
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

    public function isSavingsAccount(): bool
    {
        return $this->savingsAccount;
    }

    public function toPrimitives(): array
    {
        return [
            'id' => $this->id,
            'description' => $this->description,
            'iban' => $this->iban,
            'isSavingsAccount' => $this->savingsAccount
        ];
    }


}