<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Backend\Controller\Accounts;


use Myfinance\Portal\Accounts\Application\Create\CreateAccountCommand;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class AccountsPutController extends ApiController
{

    public function __invoke(string $id, Request $request)
    {
        $description    = $request->request->get('description');
        $iban           = $request->request->get('iban');
        $savingsAccount = $request->request->get('savingsAccount');

        $this->dispatch(new CreateAccountCommand($this->extractHashedUserFromRequest($request),
            $id,
            $description,
            $iban,
            $savingsAccount));

        return ApiResponse::createEmpty(Response::HTTP_CREATED)->format();

    }

    protected function exceptions(): array
    {
        return [];
    }
}