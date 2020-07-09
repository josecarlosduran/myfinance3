<?php

declare(strict_types=1);


namespace Myfinance\Tests\Shared\Domain;


use DateTime;

final class DateTimeMother
{
    public static function random(): DateTime
    {
        $dateWithTime      = MotherCreator::random()->dateTime;
        $dateOnlyFormatted = $dateWithTime->format("Y-m-d");
        $dateReturn        = new DateTime($dateOnlyFormatted);

        return new $dateReturn;
    }
}