<?php

declare(strict_types=1);


namespace Myfinance\Tests\Shared\Domain;


final class IbanMother
{
    public static function random(): string
    {
        return MotherCreator::random()->iban();
    }
}