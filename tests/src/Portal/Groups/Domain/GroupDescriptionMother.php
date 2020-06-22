<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Groups\Domain;


use Myfinance\Portal\Groups\Domain\GroupDescription;
use Myfinance\Tests\Shared\Domain\WordMother;

final class GroupDescriptionMother
{
    public static function create(string $value): GroupDescription
    {
        return new GroupDescription($value);
    }

    public static function random(): GroupDescription
    {
        return self::create(WordMother::random());
    }


}