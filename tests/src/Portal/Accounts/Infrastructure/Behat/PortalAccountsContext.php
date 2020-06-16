<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Accounts\Infrastructure\Behat;

use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Session;
use Doctrine\ORM\EntityManager;
use Myfinance\Portal\Accounts\Infrastructure\Persistence\DoctrineAccountRepository;
use Myfinance\Tests\Portal\Accounts\Domain\AccountMother;
use Myfinance\Tests\Shared\Infrastructure\Behat\PortalContext;
use Myfinance\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use function Lambdish\Phunctional\apply;

final class PortalAccountsContext extends PortalContext
{

    private DoctrineAccountRepository $repository;


    public function __construct(EntityManager $entityManager, DatabaseCleaner $databaseCleaner, Session $minkSession)
    {
        parent::__construct($entityManager, $databaseCleaner, $minkSession);
        $this->repository = new DoctrineAccountRepository($entityManager);
    }

    /**
     * @Given /^there is an account:$/
     */
    public function thereIsAnAccount(TableNode $table): void
    {

        apply($this->creator(), [$table->getRowsHash()]);
    }

    private function creator(): callable
    {
        return function (array $account) {
            $this->repository->save(AccountMother::withValues($account['id'],
                $account['description'],
                $account['iban'],
                $account['savingsAccount']));
        };
    }

}
