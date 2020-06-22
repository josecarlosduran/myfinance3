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

        $groupFromDate  = GroupFromDateMother::random();
        $until          = $groupFromDate;
        $groupUntilDate = new GroupUntilDate($until->date()->modify('+ 2 month')->format('d/m/Y'));

        return self::create(GroupFromDateMother::random(), $groupUntilDate);
    }

    public static function create(GroupFromDate $from, GroupUntilDate $until): GroupValidityInterval
    {
        return new GroupValidityInterval($from, $until);
    }

}