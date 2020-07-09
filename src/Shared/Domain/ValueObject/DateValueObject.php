<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\ValueObject;


use DateTime;

abstract class DateValueObject
{

    const supportedDateFormats =
        [
            'd/m/Y H:i:s',
            'Y-m-d H:i:s'
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
        $dateCreated = false;
        foreach (self::supportedDateFormats as $dateFormat) {
            $dateCreated = DateTime::createFromFormat($dateFormat, $date . " 00:00:00");
            if ($dateCreated) {
                break;
            }
        }

        $this->ensureDateCreated($dateCreated, $date);
        $this->date = $dateCreated;
    }

    private function ensureDateCreated($dateCreated, string $date): void
    {
        if (!$dateCreated) {
            throw new DateFormatNotSupported($date, self::supportedDateFormats);
        }
    }

}