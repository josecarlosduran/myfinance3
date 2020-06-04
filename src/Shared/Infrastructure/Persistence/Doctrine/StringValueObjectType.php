<?php

declare(strict_types=1);

namespace Myfinance\Shared\Infrastructure\Persistence\Doctrine;

use Myfinance\Shared\Domain\ValueObject\Uuid;
use Myfinance\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

abstract class StringValueObjectType extends StringType implements DoctrineCustomType
{
    public function getName(): string
    {
        return '';
        //return self::customTypeName();
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    /** @var Uuid $value */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->value();
    }

    abstract protected function typeClassName(): string;
}
