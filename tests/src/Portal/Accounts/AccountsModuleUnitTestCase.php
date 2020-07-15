<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts;


use Mockery\MockInterface;
use Myfinance\Portal\Accounts\Domain\Account;
use Myfinance\Portal\Accounts\Domain\AccountRepository;
use Myfinance\Portal\Accounts\Domain\Accounts;
use Myfinance\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;

abstract class AccountsModuleUnitTestCase extends UnitTestCase
{
    private $repository;

    protected function shouldSave(Account $account): void
    {
        $this->repository()
             ->shouldReceive('save')
             ->once()
             ->with($this->similarTo($account))
             ->andReturnNull();
    }

    /** @return AccountRepository|MockInterface */
    protected function repository(): MockInterface
    {
        return $this->repository = $this->repository ?: $this->mock(AccountRepository::class);

    }

    protected function shouldFind(Account $account): void
    {
        $this->repository()
             ->shouldReceive('search')
             ->once()
             ->andReturn($account);
    }

    protected function shouldSearchAccount(): void
    {
        $this->repository()
             ->shouldReceive('search')
             ->once();
    }

    protected function shouldSearchAllAccounts(Accounts $accounts): void
    {
        $this->repository()
             ->shouldReceive('searchAll')
             ->once()
             ->andReturn($accounts);
    }

}