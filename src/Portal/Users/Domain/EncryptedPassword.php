<?php

declare(strict_types=1);


namespace Myfinance\Portal\Users\Domain;


use Myfinance\Shared\Domain\ValueObject\StringValueObject;

final class EncryptedPassword extends StringValueObject
{

    public function isEqualThat(Password $anotherPassword)
    {
        return $this->value() === $anotherPassword->value();
    }


    public function isEqualDecryptedThat(Password $anotherPassword)
    {
        return $this->value() === sha1($anotherPassword->value());
    }

}