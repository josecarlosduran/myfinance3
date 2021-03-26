<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Login\Domain;


use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Tests\Shared\Domain\WordMother;

final class TenantMother
{
    public static function create(string $value): Tenant
    {
        return new Tenant($value);
    }

    public static function random(): Tenant
    {
        return self::create(WordMother::random());
    }

    public static function test(): Tenant
    {
        return self::create('test-user');
    }


}