<?php

declare(strict_types=1);

namespace Myfinance\Apps\Portal\Backend\Controller\Accounts;

use Myfinance\Portal\Accounts\Application\Find\AccountFinderResponse;
use Myfinance\Portal\Accounts\Application\Find\FindAccountQuery;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AccountsGetController extends ApiController
{


    public function __invoke(string $id, Request $request): Response
    {
        /** @var AccountFinderResponse $response */
        $response = $this->ask(new FindAccountQuery($this->extractUserNameFromRequest($request), $id));

        return ApiResponse::create($response->toPrimitives())->format();


    }

    protected function exceptions(): array
    {
        return [];
    }
}
