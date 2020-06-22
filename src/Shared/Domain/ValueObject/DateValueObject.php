<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\ValueObject;


use DateTime;

abstract class DateValueObject
{

    const supportedDateFormats =
        [
            'd/m/Y',
            'Y-m-d'
        ];

    protected ?DateTime $date;

    public function __construct(string $date)
    {

        $this->createDatefromFirstFormatSupported($date);

    }

    public function date(): ?DateTime
    {
        return $this->date;
    }

    public function toHuman(): string
    {
        return $this->date->format('d/m/Y');
    }

    public function isGreaterThan(DateValueObject $another): bool
    {
        return $this->date() > $another->date();

    }

    public function isGreaterOrEqualThan(DateValueObject $another): bool
    {
        return $this->date() >= $another->date();

    }


    private function createDatefromFirstFormatSupported(string $date): void
    {
        foreach (self::supportedDateFormats as $dateFormat) {
            $this->date = DateTime::createFromFormat($dateFormat, $date);
            if ($this->date) {
                break;
            }
        }

        $this->ensureDateCreated($date);
    }

    private function ensureDateCreated(string $date): void
    {
        if (!$this->date) {
            throw new DateFormatNotSupported($date, self::supportedDateFormats);
        }
    }

}