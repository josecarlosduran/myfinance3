<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Categories\Infrastructure\Persistence;


use Myfinance\Portal\Categories\Infrastructure\Persistence\FileCategoryRepository;
use Myfinance\Tests\Portal\Categories\Domain\CategoryMother;
use PHPUnit\Framework\TestCase;
/**
 * @group integration
 */
final class FileCategoryRepositoryTest extends TestCase
{

    /** @test */
    public function it_should_save_a_category()
    {
        $repository = new FileCategoryRepository();
        $category   = CategoryMother::random();

        $repository->save($category);

    }

    /** @test */
    public function it_should_return_an_existing_category()

    {
        $repository = new FileCategoryRepository();
        $category   = CategoryMother::random();

        $repository->save($category);

        $this->assertEquals($category, $repository->search($category->id()));
    }

    /** @test */
    public function it_should_return_null()

    {
        $repository = new FileCategoryRepository();
        $category   = CategoryMother::random();

        $this->assertEquals(null, $repository->search($category->id()));


    }

}