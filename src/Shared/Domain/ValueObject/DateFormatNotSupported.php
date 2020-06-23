<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\ValueObject;


use Myfinance\Shared\Domain\DomainError;

final class DateFormatNotSupported extends DomainError
{
    private string  $date;
    private string  $formatsSupported;

    public function __construct(string $date, array $formatsSupported)
    {
        $this->date             = $date;
        $this->formatsSupported = implode(", ", $formatsSupported);
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'date_format_not_supported';

    }

    protected function errorMessage(): string
    {
        return sprintf("The Date %s dont have a supported date format. ( %s )", $this->date, $this->formatsSupported);

    }
}