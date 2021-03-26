<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Accounts\Application\Find;


use Myfinance\Portal\Accounts\Application\Find\FindAccountQuery;
use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Tests\Portal\Login\Domain\TenantMother;
use Myfinance\Tests\Shared\Domain\UuidMother;

final class FindAccountQueryMother
{

    public static function create(Tenant $tenant, string $id): FindAccountQuery
    {
        return new FindAccountQuery($tenant, $id);
    }

    public static function random(): FindAccountQuery
    {
        return self::create(TenantMother::test(), UuidMother::random());
    }


}