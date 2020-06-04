<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Infrastructure\Persistence\Doctrine;

use Myfinance\Portal\Users\Domain\UserName;
use Myfinance\Shared\Infrastructure\Persistence\Doctrine\StringValueObjectType;

final class UserNameType extends StringValueObjectType
{
    public static function customTypeName(): string
    {
        return 'username';
    }

    protected function typeClassName(): string
    {
        return UserName::class;
    }
}