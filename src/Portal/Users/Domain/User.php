<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


use Myfinance\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private UserName          $username;
    private EncryptedPassword $password;
    private UserActive        $active;

    public function __construct(UserName $username, EncryptedPassword $password, UserActive $active)
    {
        $this->username = $username;
        $this->password = $password;
        $this->active   = $active;

    }

    public function authenticate(Credentials $credentials)
    {
        $this->ensurePasswordMatch($credentials);

        $this->record(new UserLoggedDomainEvent($this->username->value()));

    }

    private function ensurePasswordMatch(Credentials $credentials): void
    {
        if (!$credentials->password()->isEqualEncryptedThat($this->password())) {
            throw new PasswordMismatch($credentials->username());
        }
    }

    public function username(): UserName
    {
        return $this->username;
    }

    public function password(): EncryptedPassword
    {
        return $this->password;
    }

    public function active(): UserActive
    {
        return $this->active;
    }


}