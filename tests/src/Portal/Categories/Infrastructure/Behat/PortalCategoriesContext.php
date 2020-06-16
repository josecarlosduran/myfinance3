<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Categories\Infrastructure\Behat;

use Behat\Gherkin\Node\TableNode;
use Behat\Mink\Session;
use Doctrine\ORM\EntityManager;
use Myfinance\Portal\Categories\Infrastructure\Persistence\DoctrineCategoryRepository;
use Myfinance\Tests\Portal\Categories\Domain\CategoryMother;
use Myfinance\Tests\Shared\Infrastructure\Behat\PortalContext;
use Myfinance\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use function Lambdish\Phunctional\apply;

final class PortalCategoriesContext extends PortalContext
{

    private DoctrineCategoryRepository $repository;


    public function __construct(EntityManager $entityManager, DatabaseCleaner $databaseCleaner, Session $minkSession)
    {
        parent::__construct($entityManager, $databaseCleaner, $minkSession);
        $this->repository = new DoctrineCategoryRepository($entityManager);
    }

    /**
     * @Given /^there is a category:$/
     */
    public function thereIsACategory(TableNode $table): void
    {
        apply($this->creator(), [$table->getRowsHash()]);
    }

    private function creator(): callable
    {
        return function (array $category) {

            $this->repository->save(CategoryMother::withValues($category['id'], $category['description']));
        };
    }

}
