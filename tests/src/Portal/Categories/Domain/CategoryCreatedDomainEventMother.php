<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Domain;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryCreatedDomainEvent;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;

final class CategoryCreatedDomainEventMother
{
    public static function create(CategoryId $id, CategoryDescription $description): CategoryCreatedDomainEvent
    {
        return new CategoryCreatedDomainEvent($id->value(), $description->value());
    }

    public static function fromCategory(Category $Category): CategoryCreatedDomainEvent
    {
        return self::create($Category->id(), $Category->description());
    }

    public static function random(): CategoryCreatedDomainEvent
    {
        return self::create(CategoryIdMother::random(), CategoryDescriptionMother::random());
    }
}