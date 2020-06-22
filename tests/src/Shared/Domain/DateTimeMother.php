<?php

declare(strict_types=1);


namespace Myfinance\Tests\Shared\Domain;


use DateTime;

final class DateTimeMother
{
    public static function random(): DateTime
    {
        return MotherCreator::random()->dateTime;
    }
}