<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Application;


use Myfinance\Portal\Users\Domain\Credentials;
use Myfinance\Portal\Users\Domain\User;
use Myfinance\Portal\Users\Domain\UserNotFound;
use Myfinance\Portal\Users\Domain\UserRepository;
use Myfinance\Shared\Domain\Bus\Event\EventBus;
use Myfinance\Shared\Domain\JWT;

final class UserLogger
{

    private UserRepository $repository;
    private JWT            $jwt;
    private EventBus       $bus;

    public function __construct(UserRepository $repository, EventBus $bus, JWT $jwt)
    {
        $this->repository = $repository;
        $this->jwt        = $jwt;
        $this->bus        = $bus;
    }

    public function __invoke(Credentials $credentials): string
    {
        $user = $this->repository->search($credentials);

        $this->ensureUserFound($user, $credentials);

        $user->authenticate($credentials);

        $this->bus->publish(...$user->pullDomainEvents());

        return $this->jwt->generateToken(
            [
                'user' => $user->username(),
            ]
        );
    }

    private function ensureUserFound(?User $user, Credentials $credentials): void
    {
        if (!$user) {
            throw new UserNotFound($credentials->username());
        }
    }


}