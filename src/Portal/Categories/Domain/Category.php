<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Domain;


use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Portal\Users\Domain\Tenant;
use Myfinance\Shared\Domain\Aggregate\MultiTenantAggregateRoot;

final class Category extends MultiTenantAggregateRoot
{
    private CategoryId          $id;
    private CategoryDescription $description;

    public function __construct(CategoryId $id, CategoryDescription $description, Tenant $tenant)
    {
        parent::__construct($tenant);
        $this->id          = $id;
        $this->description = $description;
    }

    public static function create(CategoryId $id, CategoryDescription $description, Tenant $tenant): self
    {
        $category = new self($id, $description, $tenant);

        $category->record(new CategoryCreatedDomainEvent($id->value(), $description->value()));

        return $category;
    }


    public function id(): CategoryId
    {
        return $this->id;
    }

    public function description(): CategoryDescription
    {
        return $this->description;
    }

    public function toPrimitives()
    {
        return [
            'id' => $this->id->value(),
            'description' => $this->description->value(),
        ];
    }


}