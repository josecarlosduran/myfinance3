<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Groups;

use Myfinance\Portal\Groups\Application\SearchAll\AllGroupsSearcherResponse;
use Myfinance\Portal\Groups\Application\SearchAll\SearchAllGroupsQuery;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class GroupsGetAllController extends ApiController
{


    public function __invoke(Request $request): JsonResponse
    {
        /** @var AllGroupsSearcherResponse $response */
        $response = $this->ask(new SearchAllGroupsQuery());

        return ApiResponse::create($response->toPrimitives())->format();

    }

    protected function exceptions(): array
    {
        return [];
    }
}
