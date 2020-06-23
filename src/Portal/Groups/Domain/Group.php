<?php

declare(strict_types=1);


namespace Myfinance\Portal\Groups\Domain;


use Myfinance\Shared\Domain\Aggregate\AggregateRoot;

final class Group extends AggregateRoot
{
    private GroupId               $id;
    private GroupDescription      $description;
    private GroupValidityInterval $validityInterval;

    public function __construct(GroupId $id, GroupDescription $description, GroupValidityInterval $validityInterval)
    {
        $this->id               = $id;
        $this->description      = $description;
        $this->validityInterval = $validityInterval;
    }

    public static function create(
        GroupId $id,
        GroupDescription $description,
        GroupValidityInterval $validityInterval
    ): Group {
        $group = new self($id, $description, $validityInterval);

        $group->record(new GroupCreatedDomainEvent($id->value(),
            $description->value(),
            $validityInterval->fromToHuman(),
            $validityInterval->untilToHuman()));
        return $group;
    }

    public function id(): GroupId
    {
        return $this->id;
    }

    public function description(): GroupDescription
    {
        return $this->description;
    }

    public function validityInterval(): GroupValidityInterval
    {
        return $this->validityInterval;
    }

    public function toPrimitives()
    {
        return [
            'id'          => $this->id->value(),
            'description' => $this->description->value(),
            'from'        => $this->validityInterval->fromToHuman(),
            'until'       => $this->validityInterval->untilToHuman()
        ];
    }


}