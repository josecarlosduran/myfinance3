<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Groups\Infrastructure\Behat;

use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Session;
use Doctrine\ORM\EntityManager;
use Myfinance\Portal\Groups\Infrastructure\Persistence\DoctrineGroupRepository;
use Myfinance\Tests\Portal\Groups\Domain\GroupMother;
use Myfinance\Tests\Shared\Infrastructure\Behat\PortalContext;
use Myfinance\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use function Lambdish\Phunctional\apply;

final class PortalGroupsContext extends PortalContext
{

    private DoctrineGroupRepository $repository;


    public function __construct(EntityManager $entityManager, DatabaseCleaner $databaseCleaner, Session $minkSession)
    {
        parent::__construct($entityManager, $databaseCleaner, $minkSession);
        $this->repository = new DoctrineGroupRepository($entityManager);
    }

    /**
     * @Given /^there is a group:$/
     */
    public function thereIsAGroup(TableNode $table): void
    {
        apply($this->creator(), [$table->getRowsHash()]);
    }

    private function creator(): callable
    {
        return function (array $group) {

            $this->repository->save(GroupMother::withValues($group['id'],
                $group['description'],
                $group['from'],
                $group['until']));
        };
    }


}
