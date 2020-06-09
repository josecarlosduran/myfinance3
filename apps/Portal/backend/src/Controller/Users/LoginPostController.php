<?php

declare(strict_types=1);


namespace Myfinance\Apps\Portal\Backend\Controller\Users;


use Myfinance\Portal\Users\Application\Log\LoginUserQuery;
use Myfinance\Portal\Users\Application\Log\UserLoggerResponse;
use Myfinance\Shared\Domain\Bus\Query\QueryBus;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class LoginPostController
{

    private QueryBus   $queryBus;

    public function __construct(QueryBus $queryBus)
    {
        $this->queryBus = $queryBus;
    }

    public function __invoke(Request $request): Response
    {

        $username = $request->get('username');
        $password = $request->get('password');

        /** @var UserLoggerResponse $response */
        $response = $this->queryBus->ask(new LoginUserQuery($username, $password));

        return new JsonResponse(
            [
                'token' => $response->token()
            ]
            , RESPONSE::HTTP_CREATED
        );

    }


}