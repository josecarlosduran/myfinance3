<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Categories;

use Myfinance\Portal\Categories\Application\Find\CategoryFinderResponse;
use Myfinance\Portal\Categories\Application\Find\FindCategoryQuery;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CategoriesGetController extends ApiController
{


    public function __invoke(string $id, Request $request): Response
    {
        /** @var CategoryFinderResponse $response */
        $response = $this->ask(new FindCategoryQuery($this->extractUserNameFromRequest($request), $id));

        return ApiResponse::create($response->toPrimitives())->format();

    }

    protected function exceptions(): array
    {
        return [];
    }
}
