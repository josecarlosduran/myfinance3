<?php

declare(strict_types=1);


namespace Myfinance\Tests\Portal\Login\Domain;


use Myfinance\Portal\Users\Domain\EncryptedPassword;
use Myfinance\Portal\Users\Domain\Password;
use Myfinance\Portal\Users\Domain\User;
use Myfinance\Portal\Users\Domain\UserActive;
use Myfinance\Portal\Users\Domain\UserEmail;
use Myfinance\Portal\Users\Domain\UserFirstName;
use Myfinance\Portal\Users\Domain\UserName;
use Myfinance\Portal\Users\Domain\UserRole;
use Myfinance\Portal\Users\Domain\UserSurname;

final class UserMother
{

    public static function create(
        UserName $username,
        Password $password,
        UserFirstName $firstName,
        UserSurname $surname,
        UserEmail $email,
        UserActive $active,
        UserRole $role
    ): User {
        return new User($username,
            new EncryptedPassword($password->encrypt()),
            $firstName,
            $surname,
            $email,
            $active,
            $role);
    }

    public static function withValues(
        string $username,
        string $password,
        string $firstname,
        string $surname,
        string $mail,
        int $active,
        string $role
    ): User {
        return self::create(
            new UserName($username),
            new Password($password),
            new UserFirstName($firstname),
            new UserSurname($surname),
            new UserEmail($mail),
            new UserActive($active),
            new UserRole($role));
    }


}