<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain;


interface JWT
{
    public function generateToken(array $data): string;

    public function extractInfoFromToken(string $token): array;

}