<?php

declare(strict_types=1);


namespace Myfinance\Portal\Categories\Application;


use Myfinance\Portal\Categories\Domain\CategoryDescription;
use Myfinance\Portal\Shared\Domain\Category\CategoryId;
use Myfinance\Shared\Domain\Bus\Command\CommandHandler;

final class CreateCategoryCommandHandler implements CommandHandler
{

    private CategoryCreator $creator;

    public function __construct(CategoryCreator $creator)
    {
        $this->creator = $creator;
    }

    public function __invoke(CreateCategoryCommand $command)
    {
        $id          = new CategoryId($command->id());
        $description = new CategoryDescription($command->description());

        $this->creator->__invoke($id, $description);

    }


}