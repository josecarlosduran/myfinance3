<?php

declare(strict_types=1);


namespace Myfinance\Shared\Infrastructure\Symfony;


final class RoleHierarchy
{
    private array $hierarchy;

    public function __construct()
    {
        $this->setHierarchy();
    }


    private function setHierarchy()
    {
        $this->hierarchy = [
            'ROLE_ADMIN' => ['ROLE_USER'],
            'ROLE_SUPERADMIN' => ['ROLE_ADMIN', 'ROLE_USER']
        ];
    }

    public function hierarchy(string $parentRole): array
    {
        return isset($this->hierarchy[$parentRole]) ? $this->hierarchy[$parentRole] : [$parentRole];
    }


}