<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Categories;

use Myfinance\Portal\Categories\Application\CreateCategoryCommand;
use Myfinance\Portal\Categories\Domain\CategoryDescriptionTooLong;
use Myfinance\Shared\Domain\Bus\Command\CommandBus;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CategoriesPutController
{

    private CommandBus $commandBus;

    public function __construct(CommandBus $commandBus)
    {
        $this->commandBus = $commandBus;
    }

    public function __invoke(string $id, Request $request): Response
    {
        $description = $request->get('description');

        try {
            $this->commandBus->dispatch(new CreateCategoryCommand($id, $description));
        } catch (CategoryDescriptionTooLong $error) {
            return new Response ($error->getMessage(), Response::HTTP_BAD_REQUEST);
        }
        return new Response('', Response::HTTP_CREATED);
    }
}
