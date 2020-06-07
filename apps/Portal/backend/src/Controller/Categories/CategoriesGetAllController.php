<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Categories;

use Myfinance\Portal\Categories\Application\SearchAll\AllCategoriesSearcherResponse;
use Myfinance\Portal\Categories\Application\SearchAll\SearchAllCategoryQuery;
use Myfinance\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CategoriesGetAllController
{

    private QueryBus   $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function __invoke(Request $request): Response
    {
        /** @var AllCategoriesSearcherResponse $response */
        $response = $this->queryBus->ask(new SearchAllCategoryQuery());

        return new JsonResponse($response->getCollection());

    }
}
