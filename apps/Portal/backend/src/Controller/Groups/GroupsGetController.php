<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Backend\Controller\Groups;


use Myfinance\Portal\Groups\Application\Find\FindGroupQuery;
use Myfinance\Portal\Groups\Application\Find\GroupFinderResponse;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class GroupsGetController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {
        /** @var GroupFinderResponse $response */
        $response = $this->ask(new FindGroupQuery($id));

        return ApiResponse::create($response->toPrimitives())->format();
    }

    protected function exceptions(): array
    {
        return [];
    }
}