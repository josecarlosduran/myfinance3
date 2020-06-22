<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Backend\Controller\Groups;


use Myfinance\Portal\Groups\Application\Create\CreateGroupCommand;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class GroupsPutController extends ApiController
{
    public function __invoke(string $id, Request $request)
    {
        $description = $request->request->get('description');
        $from        = $request->request->get('from');
        $until       = $request->request->get('until');

        $this->dispatch(new CreateGroupCommand($id, $description, $from, $until));

        return ApiResponse::createEmpty(Response::HTTP_CREATED)->format();

    }

    protected function exceptions(): array
    {
        return [];
    }

}