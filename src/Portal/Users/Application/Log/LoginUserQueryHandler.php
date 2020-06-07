<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Application\Log;


use Myfinance\Portal\Users\Domain\Credentials;
use Myfinance\Portal\Users\Domain\Password;
use Myfinance\Portal\Users\Domain\UserName;
use Myfinance\Shared\Domain\Bus\Query\QueryHandler;

final class LoginUserQueryHandler implements QueryHandler
{
    private UserLogger $userLogger;

    public function __construct(UserLogger $userLogger)
    {
        $this->userLogger = $userLogger;
    }

    public function __invoke(LoginUserQuery $query): UserLoggerResponse
    {
        $username = $query->username();
        $password = $query->password();

        $credentials = new Credentials (new UserName($username), new Password($password));
        $token       = $this->userLogger->__invoke($credentials);

        return new UserLoggerResponse($token);

    }

}