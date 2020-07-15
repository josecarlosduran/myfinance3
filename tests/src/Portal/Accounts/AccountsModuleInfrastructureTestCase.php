<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts;


use Doctrine\ORM\EntityManager;
use Myfinance\Portal\Accounts\Domain\AccountRepository;
use Myfinance\Portal\Accounts\Infrastructure\Persistence\DoctrineAccountRepository;
use Myfinance\Tests\Portal\Shared\Infrastructure\PhpUnit\PortalContextInfrastructureTestCase;

class AccountsModuleInfrastructureTestCase extends PortalContextInfrastructureTestCase
{
    protected function doctrineRepository(): AccountRepository
    {
        return new DoctrineAccountRepository($this->service(EntityManager::class));
    }

}