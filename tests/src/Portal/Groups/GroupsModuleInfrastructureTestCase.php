<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Groups;

use Doctrine\ORM\EntityManager;
use Myfinance\Portal\Groups\Domain\GroupRepository;
use Myfinance\Portal\Groups\Infrastructure\Persistence\DoctrineGroupRepository;
use Myfinance\Tests\Portal\Shared\Infrastructure\PhpUnit\PortalContextInfrastructureTestCase;

abstract class GroupsModuleInfrastructureTestCase extends PortalContextInfrastructureTestCase
{
    protected function doctrineRepository(): GroupRepository
    {
        return new DoctrineGroupRepository($this->service(EntityManager::class));
    }
}