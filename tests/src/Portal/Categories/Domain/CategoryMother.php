<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Domain;


use Myfinance\Portal\Categories\Application\Create\CreateCategoryCommand;
use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Tests\Portal\Login\Domain\TenantMother;

final class CategoryMother
{
    public static function create(CategoryId $id, CategoryDescription $description, Tenant $tenant): Category
    {
        return new Category($id, $description, $tenant);
    }

    public static function withValues(string $id, string $description, string $userName): Category
    {
        return self::create(
            new CategoryId($id),
            new CategoryDescription($description),
            new Tenant($userName)
        );
    }

    public static function fromCommand(CreateCategoryCommand $command): Category
    {
        return self::create(
            CategoryIdMother::create($command->id()),
            CategoryDescriptionMother::create($command->description()),
            TenantMother::create($command->user())
        );
    }

    public static function withId(CategoryId $categoryId): Category
    {
        return self::create(
            CategoryIdMother::create($categoryId->value()),
            CategoryDescriptionMother::random(),
            TenantMother::test()
        );
    }

    public static function random(): Category
    {
        return self::create(CategoryIdMother::random(), CategoryDescriptionMother::random(), TenantMother::test());
    }


}