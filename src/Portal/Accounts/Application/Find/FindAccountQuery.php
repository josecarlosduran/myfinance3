<?php

declare(strict_types=1);


namespace Myfinance\Portal\Accounts\Application\Find;


use Myfinance\Shared\Domain\Bus\Query\HashedUserQuery;

final class FindAccountQuery extends HashedUserQuery
{
    private string $id;

    public function __construct(string $hashedUser, string $id)
    {
        parent::__construct($hashedUser);
        $this->id = $id;
    }

    public function id(): string
    {
        return $this->id;
    }


}