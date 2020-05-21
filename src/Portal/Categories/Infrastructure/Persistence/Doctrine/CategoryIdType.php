<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Infrastructure\Persistence\Doctrine;

use Myfinance\Shared\Infrastructure\Persistence\Doctrine\UuidType;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;

final class CategoryIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'category_id';
    }

    protected function typeClassName(): string
    {
        return CategoryId::class;
    }
}