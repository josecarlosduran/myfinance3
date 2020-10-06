<?php

declare(strict_types=1);

namespace Myfinance\Shared\Infrastructure\Symfony;

use Myfinance\Shared\Domain\Bus\Command\CommandBus;
use Myfinance\Shared\Domain\IncorrectAuthenticationTokenFormat;
use Myfinance\Shared\Domain\JWT;
use Myfinance\Shared\Domain\UserNotAuthorized;
use Symfony\Component\HttpKernel\Event\RequestEvent;

final class JWTAuthMiddleware
{
    private CommandBus $bus;
    private JWT        $jwt;
    private array      $decryptedToken;

    public function __construct(CommandBus $bus, JWT $jwt)
    {
        $this->bus = $bus;
        $this->jwt = $jwt;
    }

    public function onKernelRequest(RequestEvent $event): void
    {

        if ($this->userShouldAuthenticate($event)) {

            $this->AuthenticateUser($event);

            $this->ensureUserAuthorization($event);

            $this->addUserDataToRequest($event);
        }
    }

    private function userShouldAuthenticate(RequestEvent $event)
    {
        return $event->getRequest()->attributes->get('auth', false);
    }

    private function AuthenticateUser(RequestEvent $event): void
    {
        $this->ensureExistAuthenticationToken($event);

        $token = $this->extractTokenFromHeader($event);

        $this->decryptedToken = $this->jwt->extractInfoFromToken($token);
    }

    private function ensureExistAuthenticationToken(RequestEvent $event): void
    {
        $existAuthenticationToken = $event->getRequest()->headers->has('authorization');
        if (!$existAuthenticationToken) {
            throw new IncorrectAuthenticationTokenFormat();
        }
    }

    private function extractTokenFromHeader(RequestEvent $event)
    {
        $authenticationHeader = $event->getRequest()->headers->get('authorization');
        $tokenParts           = explode(" ", $authenticationHeader);
        $this->ensureTokenFormat($tokenParts);

        return $tokenParts[1];
    }

    private function ensureTokenFormat(array $tokenParts): void
    {
        if (count($tokenParts) != 2 or $tokenParts[0] != 'Bearer') {
            throw new IncorrectAuthenticationTokenFormat();
        }
    }

    private function ensureUserAuthorization(RequestEvent $event): void
    {
        $tokenData    = $this->decryptedToken['data'];
        $rolesGranted = $event->getRequest()->attributes->get('roles', 'ROLE_USER');
        $rolesGranted = is_array($rolesGranted) ? $rolesGranted : [$rolesGranted];

        $roles = $tokenData->roles;

        $rolesMatched = array_intersect($rolesGranted, $roles);
        if (count($rolesMatched) == 0) {
            throw new UserNotAuthorized();
        }


    }

    private function addUserDataToRequest(RequestEvent $event): void
    {
        $tokenData = $this->decryptedToken['data'];
        $event->getRequest()->attributes->set('authenticated_username', $tokenData->user);
        $event->getRequest()->attributes->set('authenticated_userRoles', $tokenData->roles);
        $event->getRequest()->attributes->set('authenticated_userHash', $tokenData->userHash);

    }
}
