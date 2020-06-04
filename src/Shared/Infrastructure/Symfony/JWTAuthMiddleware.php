<?php

declare(strict_types=1);

namespace Myfinance\Shared\Infrastructure\Symfony;

use Myfinance\Shared\Domain\Bus\Command\CommandBus;
use Myfinance\Shared\Domain\IncorrectAuthenticationTokenFormat;
use Myfinance\Shared\Domain\JWT;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Event\RequestEvent;
use function Lambdish\Phunctional\get;

final class JWTAuthMiddleware
{
    private     $bus;
    private JWT $jwt;

    public function __construct(CommandBus $bus, JWT $jwt)
    {
        $this->bus = $bus;
        $this->jwt = $jwt;
    }

    public function onKernelRequest(RequestEvent $event): void
    {
        $shouldAuthenticate = $event->getRequest()->attributes->get('auth', false);

        if ($shouldAuthenticate) {
            $this->ensureExistAuthenticationToken($event);

            $token = $this->extractTokenFromHeader($event);

            $decryptedToken = $this->jwt->extractInfoFromToken($token);

            $this->addUserDataToRequest($decryptedToken['data'], $event);
        }
    }


    private function addUserDataToRequest(\stdClass $tokenData, RequestEvent $event): void
    {
        $event->getRequest()->attributes->set('authenticated_username', $tokenData->user);
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
}
