<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups\Domain;


use Myfinance\Portal\Groups\Domain\GroupId;
use Myfinance\Tests\Shared\Domain\UuidMother;

final class GroupIdMother
{
    public static function create(string $value): GroupId
    {
        return new GroupId($value);
    }

    public static function random(): GroupId
    {
        return self::create(UuidMother::random());
    }


}