<?php

declare(strict_types=1);


namespace Myfinance\Shared\Infrastructure;


use Firebase\JWT\JWT as FireJWT;
use Myfinance\Shared\Domain\JWT;

final class FireBaseJWT implements JWT
{

    private string $key;
    private int    $validityTime;

    public function __construct(string $key, int $validityTime)
    {
        $this->key          = $key;
        $this->validityTime = $validityTime;
    }

    public function generateToken(array $data): string
    {

        $actualTime = time();
        $expireTime = $actualTime + $this->validityTime;

        $payload = [
            'data' => $data,
            'iat' => $actualTime,
            'nbf' => $expireTime
        ];

        return FireJWT::encode($payload, $this->key);
    }

    public function extractInfoFromToken(string $token): array
    {
        $decodedToken = (array)FireJWT::decode($token, $this->key, ['HS256']);
        return (array)$decodedToken;
    }
}