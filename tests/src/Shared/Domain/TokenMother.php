<?php

declare(strict_types=1);


namespace Myfinance\Tests\Shared\Domain;


use Myfinance\Portal\Users\Domain\UserHash;
use Myfinance\Shared\Infrastructure\FireBaseJWT;

final class TokenMother
{

    const JWT_KEY           = 'kbdfiafh832huwerpiu@@@122';
    const JWT_VALIDITY_TIME = 3600;

    public function random(): string
    {

        $data = [
            'user' => WordMother::random(),
            'role' => [WordMother::random()]
        ];
        return self::create($data);

    }


    public static function create($data): string
    {
        $jwt = new FireBaseJWT(self::JWT_KEY, self::JWT_VALIDITY_TIME);
        return $jwt->generateToken($data);
    }


    public static function withRoleUser()
    {
        $userHash = new UserHash('test-user');
        $data     = [
            'user'     => 'test-user',
            'roles'    => ['ROLE_USER'],
            'userHash' => $userHash->value()
        ];
        return self::create($data);

    }


}