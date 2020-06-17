<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Accounts;

use Myfinance\Portal\Accounts\Application\SearchAll\AllAccountsSearcherResponse;
use Myfinance\Portal\Accounts\Application\SearchAll\SearchAllAccountsQuery;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;

final class AccountsGetAllController extends ApiController
{


    public function __invoke(Request $request): JsonResponse
    {
        /** @var AllAccountsSearcherResponse $response */
        $response = $this->ask(new SearchAllAccountsQuery());
        return ApiResponse::create($response->toPrimitives())->format();

    }

    protected function exceptions(): array
    {
        return [];
    }
}
