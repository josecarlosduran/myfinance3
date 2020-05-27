<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Categories;

use Myfinance\Portal\Categories\Application\CategoryFinderResponse;
use Myfinance\Portal\Categories\Application\FindCategoryQuery;
use Myfinance\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CategoriesGetController
{

    private QueryBus   $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function __invoke(string $id, Request $request): Response
    {
        /** @var CategoryFinderResponse $response */
        $response = $this->queryBus->ask(new FindCategoryQuery($id));

        return new JsonResponse(
            [
                'id' => $response->id(),
                'description' => $response->description()
            ]
        );
    }
}
