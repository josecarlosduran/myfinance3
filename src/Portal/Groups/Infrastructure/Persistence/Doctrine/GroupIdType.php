<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Infrastructure\Persistence\Doctrine;

use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class GroupIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'group_id';
    }

    protected function typeClassName(): string
    {
        return GroupId::class;
    }
}