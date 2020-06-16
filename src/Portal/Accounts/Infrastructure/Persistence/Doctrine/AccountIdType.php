<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Infrastructure\Persistence\Doctrine;

use Myfinance\Portal\Accounts\Domain\AccountId;
use Myfinance\Shared\Infrastructure\Persistence\Doctrine\UuidType;

final class AccountIdType extends UuidType
{
    public static function customTypeName(): string
    {
        return 'account_id';
    }

    protected function typeClassName(): string
    {
        return AccountId::class;
    }
}