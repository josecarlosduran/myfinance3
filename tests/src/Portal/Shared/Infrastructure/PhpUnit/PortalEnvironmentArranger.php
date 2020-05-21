<?php

declare(strict_types=1);

namespace Myfinance\Tests\Portal\Shared\Infrastructure\PhpUnit;

use Myfinance\Tests\Shared\Infrastructure\Arranger\EnvironmentArranger;
use Myfinance\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use Doctrine\ORM\EntityManager;
use function Lambdish\Phunctional\apply;

final class PortalEnvironmentArranger implements EnvironmentArranger
{
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager)
    {
        $this->entityManager = $entityManager;
    }

    public function arrange(): void
    {
        apply(new DatabaseCleaner(), [$this->entityManager]);
    }

    public function close(): void
    {
    }
}
