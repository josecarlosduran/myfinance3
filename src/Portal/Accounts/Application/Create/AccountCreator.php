<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Create;


use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Accounts\Domain\AccountDescription;
use Myfinance\Portal\Accounts\Domain\AccountIban;
use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Portal\Accounts\Domain\AccountIsSavingsAccount;
use Myfinance\Portal\Accounts\Domain\AccountRepository;
use Myfinance\Shared\Domain\Bus\Event\EventBus;

final class AccountCreator
{
    private AccountRepository $repository;
    private EventBus          $bus;

    public function __construct(AccountRepository $repository, EventBus $bus)
    {
        $this->repository = $repository;
        $this->bus        = $bus;
    }

    public function __invoke(
        AccountId $id,
        AccountDescription $description,
        AccountIban $iban,
        AccountIsSavingsAccount $isSavingsAccount
    ) {
        $account = Account::create($id, $description, $iban, $isSavingsAccount);
        $this->repository->save($account);

        $this->bus->publish(...$account->pullDomainEvents());
    }
}