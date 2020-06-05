<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Application;


use Myfinance\Portal\Users\Domain\Credentials;
use Myfinance\Portal\Users\Domain\User;
use Myfinance\Portal\Users\Domain\UserNotFound;
use Myfinance\Portal\Users\Domain\UserRepository;
use Myfinance\Shared\Domain\Bus\Event\EventBus;
use Myfinance\Shared\Domain\JWT;
use Myfinance\Shared\Infrastructure\Symfony\RoleHierarchy;

final class UserLogger
{

    private UserRepository $repository;
    private JWT            $jwt;
    private EventBus       $bus;
    private RoleHierarchy  $roleHierarchy;

    public function __construct(UserRepository $repository, EventBus $bus, JWT $jwt, RoleHierarchy $roleHierarchy)
    {
        $this->repository    = $repository;
        $this->jwt           = $jwt;
        $this->bus           = $bus;
        $this->roleHierarchy = $roleHierarchy;
    }

    public function __invoke(Credentials $credentials): string
    {
        $user = $this->repository->search($credentials);

        $this->ensureUserFound($user, $credentials);

        $user->authenticate($credentials);

        $userRoles = $this->formatUserRoles($user);

        $userRolesExpanded = $this->expandRolesFromHierarchy($userRoles);

        $this->bus->publish(...$user->pullDomainEvents());

        return $this->jwt->generateToken(
            [
                'user' => $user->username()->value(),
                'roles' => $userRolesExpanded,
            ]
        );
    }

    private function ensureUserFound(?User $user, Credentials $credentials): void
    {
        if (!$user) {
            throw new UserNotFound($credentials->username());
        }
    }

    private function formatUserRoles(?User $user): array
    {
        return explode(",", $user->role()->value());
    }

    private function expandRolesFromHierarchy(array $userRoles)
    {
        $expandedUserRoles = $userRoles;

        foreach ($userRoles as $userRole) {
            $hierarchy         = $this->roleHierarchy->hierarchy($userRole);
            $expandedUserRoles = array_merge($expandedUserRoles, $hierarchy);
        }

        return array_unique($expandedUserRoles);


    }


}