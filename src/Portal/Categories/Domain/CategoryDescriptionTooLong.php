<?php

declare(strict_types=1);

namespace Myfinance\Portal\Categories\Domain;

use Myfinance\Shared\Domain\DomainError;

final class CategoryDescriptionTooLong extends DomainError
{
    private string $description;

    public function __construct(string $description)
    {

        $this->description = $description;

        parent::__construct();

    }

    public function errorCode(): string
    {
        return 'category_description_too_long';
    }

    protected function errorMessage(): string
    {
        return sprintf('The category description <%s> is longer than %s characters',
            $this->description,
            CategoryDescription::MAX_LENGTH);
    }
}
