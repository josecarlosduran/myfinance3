<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups\Domain;


use Myfinance\Portal\Groups\Domain\GroupFromDate;
use Myfinance\Tests\Shared\Domain\DateTimeMother;

final class GroupFromDateMother
{
    public static function create(string $value): GroupFromDate
    {
        return new GroupFromDate($value);
    }

    public static function random(): GroupFromDate
    {
        return self::create(DateTimeMother::random()->format('d/m/Y'));

    }


}