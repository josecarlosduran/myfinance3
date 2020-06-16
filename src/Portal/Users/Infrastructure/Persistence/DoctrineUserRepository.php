<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Infrastructure\Persistence;


use Myfinance\Portal\Users\Domain\Credentials;
use Myfinance\Portal\Users\Domain\User;
use Myfinance\Portal\Users\Domain\UserRepository;
use Myfinance\Shared\Infrastructure\Persistence\Doctrine\DoctrineRepository;

final class DoctrineUserRepository extends DoctrineRepository implements UserRepository
{


    /** @noinspection PhpIncompatibleReturnTypeInspection */
    public function search(Credentials $credentials): ?User
    {
        return $this->repository(User::class)->findOneBy(
            [
                'username' => $credentials->username(),
                'active.value' => 1,
            ]
        );

    }


    public function save(User $user): void
    {
        $this->persist($user);

    }
}