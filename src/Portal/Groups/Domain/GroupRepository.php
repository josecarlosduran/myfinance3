<?php

declare(strict_types=1);

namespace Myfinance\Portal\Groups\Domain;


interface GroupRepository
{
    public function save(Group $group): void;

    public function search(GroupId $id): ?Group;

    public function searchAll(): Groups;
}