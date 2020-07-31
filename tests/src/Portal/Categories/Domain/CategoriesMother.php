<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Domain;


use Myfinance\Portal\Categories\Domain\Categories;

final class CategoriesMother
{
    public static function some(): Categories
    {
        return self::create(random_int(1, 10));
    }

    public static function empty(): Categories
    {
        return self::create(0);
    }

    public static function create(int $number): Categories
    {
        $accountElements = [];

        for ($i = 0; $i <= $number; $i++) {
            $accountElements[] = CategoryMother::random();

        }
        return new Categories($accountElements);
    }


}