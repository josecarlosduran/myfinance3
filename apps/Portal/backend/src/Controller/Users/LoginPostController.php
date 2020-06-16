<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Backend\Controller\Users;


use Myfinance\Portal\Users\Application\Log\LoginUserQuery;
use Myfinance\Portal\Users\Application\Log\UserLoggerResponse;
use Myfinance\Shared\Domain\ApiResponse\ApiResponse;
use Myfinance\Shared\Infrastructure\Symfony\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class LoginPostController extends ApiController
{

    public function __invoke(Request $request): Response
    {

        $username = $request->get('username');
        $password = $request->get('password');

        /** @var UserLoggerResponse $response */
        $response = $this->ask(new LoginUserQuery($username, $password));

        return ApiResponse::create($response->toPrimitives(), ApiResponse::HTTP_CREATED)->format();

    }


    protected function exceptions(): array
    {
        return [];

    }
}