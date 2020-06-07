<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Application\Log;


use Myfinance\Shared\Domain\Bus\Query\Response;

final class UserLoggerResponse implements Response
{
    private string $token;

    public function __construct(string $token)
    {

        $this->token = $token;
    }

    public function token(): string
    {
        return $this->token;
    }


}