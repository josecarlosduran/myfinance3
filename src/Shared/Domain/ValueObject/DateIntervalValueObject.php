<?php

declare(strict_types=1);


namespace Myfinance\Shared\Domain\ValueObject;


use Myfinance\Shared\Domain\IncorrectDateOrder;

abstract class DateIntervalValueObject
{
    protected DateValueObject $from;
    protected DateValueObject $until;

    public function __construct(DateValueObject $from, DateValueObject $until)
    {
        $this->ensureUntilIsGreaterThanFrom($from, $until);
        $this->from  = $from;
        $this->until = $until;
    }

    public function from(): DateValueObject
    {
        return $this->from;
    }

    public function until(): DateValueObject
    {
        return $this->until;
    }


    public function fromToHuman(): string
    {
        return $this->from->toHuman();
    }

    public function untilToHuman(): string
    {
        return $this->until->toHuman();
    }


    private function ensureUntilIsGreaterThanFrom(DateValueObject $from, DateValueObject $until)
    {
        if (!$until->isGreaterThan($from)) {
            throw new IncorrectDateOrder($from->date()->format('d/m/Y'), $until->date()->format('d/m/Y'));
        }
    }

}