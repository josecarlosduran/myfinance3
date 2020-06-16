<?php

declare(strict_types=1);


namespace Myfinance\Tests\Shared\Domain;


final class PasswordMother
{
    public static function random(): string
    {
        return MotherCreator::random()->password();
    }
}