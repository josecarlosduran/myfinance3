<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Login\Infrastructure\Behat;

use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Session;
use Doctrine\ORM\EntityManager;
use Myfinance\Portal\Users\Infrastructure\Persistence\DoctrineUserRepository;
use Myfinance\Tests\Portal\Login\Domain\UserMother;
use Myfinance\Tests\Shared\Infrastructure\Behat\PortalContext;
use Myfinance\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use function Lambdish\Phunctional\apply;

final class PortalLoginContext extends PortalContext
{

    private DoctrineUserRepository $repository;


    public function __construct(EntityManager $entityManager, DatabaseCleaner $databaseCleaner, Session $minkSession)
    {
        parent::__construct($entityManager, $databaseCleaner, $minkSession);
        $this->repository = new DoctrineUserRepository($entityManager);
    }

    /**
     * @Given /^there is a user:$/
     */
    public function thereIsAnUser(TableNode $table): void
    {

        apply($this->creator(), [$table->getRowsHash()]);
    }

    private function creator(): callable
    {
        return function (array $user) {
            $this->repository->save(UserMother::withValues(
                $user['username'],
                $user['password'],
                $user['firstname'],
                $user['surname'],
                $user['email'],
                (int)$user['active'],
                $user['role']));
        };
    }

}
