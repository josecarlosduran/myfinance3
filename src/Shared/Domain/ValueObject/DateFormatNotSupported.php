<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\ValueObject;


use Myfinance\Shared\Domain\DomainError;

final class DateFormatNotSupported extends DomainError
{
    private string $date;
    private array  $formatsSupported;

    public function __construct(string $date, array $formatsSupported)
    {
        parent::__construct();
        $this->date             = $date;
        $this->formatsSupported = implode(", ", $formatsSupported);
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