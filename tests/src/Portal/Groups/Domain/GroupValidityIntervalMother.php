<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups\Domain;


use Myfinance\Portal\Groups\Domain\GroupFromDate;
use Myfinance\Portal\Groups\Domain\GroupUntilDate;
use Myfinance\Portal\Groups\Domain\GroupValidityInterval;

final class GroupValidityIntervalMother
{
    public static function random(): GroupValidityInterval
    {

        $groupFromDate = GroupFromDateMother::random();
        $until         = clone $groupFromDate->date();
        $until->modify('+ 1 day');
        $groupUntilDate = new GroupUntilDate($until->format('d/m/Y'));

        return self::create($groupFromDate, $groupUntilDate);
    }

    public static function create(GroupFromDate $from, GroupUntilDate $until): GroupValidityInterval
    {
        return new GroupValidityInterval($from, $until);
    }

}