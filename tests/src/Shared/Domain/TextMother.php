<?php

declare(strict_types=1);


namespace Myfinance\Tests\Shared\Domain;


final class TextMother
{

    private const DEFAULT_LENGTH = 100;

    public static function random(int $length = self::DEFAULT_LENGTH): string
    {
        return MotherCreator::random()->text($length);
    }

}


