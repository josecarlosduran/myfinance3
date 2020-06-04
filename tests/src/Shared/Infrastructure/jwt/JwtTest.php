<?php

declare(strict_types=1);


namespace Myfinance\Tests\Shared\Infrastructure\jwt;


use Firebase\JWT\ExpiredException;
use Firebase\JWT\JWT;
use Firebase\JWT\SignatureInvalidException;
use Monolog\Test\TestCase;

/**
 * @group integration
 */
final class JwtTest extends TestCase
{
    const TEST_KEY = 'some_test_key';
    const ONE_HOUR = 3600;

    /** @test */
    public function it_should_encode_a_JWT_token()
    {

        $actualTime = time();

        $payload = [
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => $actualTime,
            "nbf" => $actualTime + self::ONE_HOUR
        ];

        JWT::encode($payload, self::TEST_KEY);


    }

    /** @test */
    public function it_should_decode_a_JWT_token()
    {
        $actualTime = time();


        $payload = [
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => $actualTime,
            "exp" => $actualTime + self::ONE_HOUR
        ];

        $jwt = JWT::encode($payload, self::TEST_KEY);


        $decoded = (array)JWT::decode($jwt, self::TEST_KEY, ['HS256']);

        $this->assertEquals($decoded, $payload);


    }

    /** @test */
    public function it_should_launch_a_SIGNATURE_INVALID_EXCEPTION()
    {
        $actualTime = time();

        $payload = [
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => $actualTime,
            "exp" => $actualTime + self::ONE_HOUR
        ];

        $jwt = JWT::encode($payload, 'incorrect_key');


        $this->expectException(SignatureInvalidException::class);


        JWT::decode($jwt, self::TEST_KEY, ['HS256']);


    }

    /** @test */
    public function it_should_launch_a__EXCEPTION()
    {
        $actualTime = time();

        $payload = [
            "iss" => "http://example.org",
            "aud" => "http://example.com",
            "iat" => $actualTime,
            "exp" => $actualTime - 10
        ];

        $jwt = JWT::encode($payload, self::TEST_KEY);


        $this->expectException(ExpiredException::class);


        JWT::decode($jwt, self::TEST_KEY, ['HS256']);

    }

}