<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Categories;

use Myfinance\Portal\Categories\Application\SearchAll\AllCategoriesSearcherResponse;
use Myfinance\Portal\Categories\Application\SearchAll\SearchAllCategoryQuery;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class CategoriesGetAllController extends ApiController
{


    public function __invoke(Request $request): JsonResponse
    {
        /** @var AllCategoriesSearcherResponse $response */
        $response = $this->ask(new SearchAllCategoryQuery($this->extractUserNameFromRequest($request)));

        return ApiResponse::create($response->toPrimitives())->format();
    }

    protected function exceptions(): array
    {
        return [];
    }
}
