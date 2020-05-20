<?php

declare(strict_types=1);

namespace Myfinance\Portal\Shared\Infrastructure\Doctrine;

use Myfinance\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;
use Doctrine\ORM\EntityManagerInterface;

final class PortalEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../databases/Portal.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes               = DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../Portal', 'Myfinance\Portal');
        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../Portal', 'Portal');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}
