<?php

declare(strict_types=1);

namespace Myfinance\Tests\Shared\Infrastructure\Symfony;

use Myfinance\Tests\Shared\Domain\TokenMother;
use Symfony\Component\HttpKernel\Event\RequestEvent;

final class InsertUserTokenMiddleware
{

    public function onKernelRequest(RequestEvent $event): void
    {
        $token = 'Bearer ' . TokenMother::withRoleUser();
        $event->getRequest()->headers->set('authorization', $token);

    }


}
