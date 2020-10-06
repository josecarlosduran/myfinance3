<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


use Myfinance\Shared\Domain\Aggregate\AggregateRoot;

final class User extends AggregateRoot
{
    private UserName          $username;
    private EncryptedPassword $password;
    private UserFirstName     $firstName;
    private UserSurname       $surname;
    private UserEmail         $email;
    private UserActive        $active;
    private UserRole          $role;


    public function __construct(
        UserName $username,
        EncryptedPassword $password,
        UserFirstName $firstName,
        UserSurname $surname,
        UserEmail $email,
        UserActive $active,
        UserRole $role
    ) {
        $this->username  = $username;
        $this->password  = $password;
        $this->active    = $active;
        $this->firstName = $firstName;
        $this->surname   = $surname;
        $this->email     = $email;
        $this->role      = $role;

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

    public function firstName(): UserFirstName
    {
        return $this->firstName;
    }

    public function surname(): UserSurname
    {
        return $this->surname;
    }

    public function email(): UserEmail
    {
        return $this->email;
    }


    public function active(): UserActive
    {
        return $this->active;
    }

    public function role(): UserRole
    {
        return $this->role;
    }

    public function userHash(): UserHash
    {
        return new UserHash($this->username->value());
    }


}