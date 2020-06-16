<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Create;


use Myfinance\Portal\Accounts\Domain\AccountDescription;
use Myfinance\Portal\Accounts\Domain\AccountIban;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Accounts\Domain\AccountIsSavingsAccount;
use Myfinance\Shared\Domain\Bus\Command\CommandHandler;

final class CreateAccountCommandHandler implements CommandHandler
{
    private AccountCreator $accountCreator;

    public function __construct(AccountCreator $accountCreator)
    {
        $this->accountCreator = $accountCreator;
    }


    public function __invoke(CreateAccountCommand $command)
    {
        $this->accountCreator->__invoke(
            new AccountId($command->id()),
            new AccountDescription($command->description()),
            new AccountIban($command->iban()),
            new AccountIsSavingsAccount($command->savingsAccount())
        );

    }

}