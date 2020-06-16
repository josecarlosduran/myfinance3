<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


use Myfinance\Shared\Domain\ValueObject\StringValueObject;

final class Password extends StringValueObject
{
    public function isEqualThat(Password $anotherPassword)
    {
        return $this->value() === $anotherPassword->value();
    }

    public function encrypt()
    {
        return sha1($this->value());
    }

    public function isEqualEncryptedThat(EncryptedPassword $anotherPassword)
    {
        return $this->encrypt() === $anotherPassword->value();
    }

}