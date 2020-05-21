<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Categories;

use Doctrine\ORM\EntityManager;
use Myfinance\Portal\Categories\Domain\CategoryRepository;
use Myfinance\Portal\Categories\Infrastructure\Persistence\DoctrineCategoryRepository;
use Myfinance\Tests\Portal\Shared\Infrastructure\PhpUnit\PortalContextInfrastructureTestCase;

abstract class CategoriesModuleInfrastructureTestCase extends PortalContextInfrastructureTestCase
{
    protected function doctrineRepository(): CategoryRepository
    {
        return new DoctrineCategoryRepository($this->service(EntityManager::class));
    }
}