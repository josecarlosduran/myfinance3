<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Infrastructure\File;


use Myfinance\Portal\Categories\Domain\Category;
use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Categories\Infrastructure\File\FileCategoryRepository;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Shared\Domain\ValueObject\Uuid;
use PHPUnit\Framework\TestCase;

final class FileCategoryRepositoryTest extends TestCase
{

    /** @test */
    public function it_should_save_a_category()
    {
        $repository = new FileCategoryRepository();
        $category   = new Category(new CategoryId(Uuid::random()->value()), new CategoryDescription('description'));

        $repository->save($category);

    }

    /** @test */
    public function it_should_return_an_existing_category()

    {
        $repository = new FileCategoryRepository();
        $category   = new Category(new CategoryId(Uuid::random()->value()), new CategoryDescription('description'));

        $repository->save($category);

        $this->assertEquals($category, $repository->search($category->id()));
    }

    /** @test */
    public function it_should_return_null()

    {
        $repository = new FileCategoryRepository();
        $category   = new Category(new CategoryId(Uuid::random()->value()), new CategoryDescription('description'));

        $this->assertEquals(null, $repository->search($category->id()));


    }

}