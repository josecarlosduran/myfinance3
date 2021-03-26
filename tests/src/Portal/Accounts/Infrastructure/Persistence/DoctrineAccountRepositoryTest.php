<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Infrastructure\Persistence;

use Myfinance\Tests\Portal\Accounts\AccountsModuleInfrastructureTestCase;
use Myfinance\Tests\Portal\Accounts\Domain\AccountIdMother;
use Myfinance\Tests\Portal\Accounts\Domain\AccountMother;
use Myfinance\Tests\Portal\Login\Domain\TenantMother;

/**
 * @group integration
 */
final class DoctrineAccountRepositoryTest extends AccountsModuleInfrastructureTestCase
{

    /** @test */
    public function it_should_save_a_account(): void
    {
        $account = AccountMother::random();

        $this->doctrineRepository()->save($account);
        $this->clearUnitOfWork();
    }

    /** @test */
    public function it_should_return_an_existing_account(): void
    {
        $account = AccountMother::random();

        $this->doctrineRepository()->save($account);
        $this->clearUnitOfWork();

        $this->assertEquals($account, $this->doctrineRepository()->search(TenantMother::test(), $account->id()));
    }

    /** @test */
    public function it_should_not_return_a_non_existing_account(): void
    {
        $this->assertNull($this->doctrineRepository()->search(TenantMother::test(), AccountIdMother::random()));
    }

    /** @test */
    public function it_should_return_some_existing_accounts(): void
    {

        $accounts = [];

        for ($i = 0; $i <= 1; $i++) {
            $account      = AccountMother::random();
            $accounts[$i] = $account;
            $this->doctrineRepository()->save($account);
            $this->clearUnitOfWork();
        }

        $accounts = $this->orderAccountsbyId($accounts);

        $response = $this->doctrineRepository()->searchAll(TenantMother::test())->getIterator()->getArrayCopy();
        $this->assertEquals($accounts, $response);


    }

    private function orderAccountsbyId(array $accounts): array
    {
        if ($accounts[0]->id()->value() > $accounts[1]->id()->value()) {
            $auxAccount  = $accounts[0];
            $accounts[0] = $accounts[1];
            $accounts[1] = $auxAccount;
        }
        return $accounts;
    }


}