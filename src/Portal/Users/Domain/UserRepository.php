<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


interface UserRepository
{
    public function search(Credentials $credentials): ?User;

}