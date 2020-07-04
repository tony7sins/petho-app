<?php

namespace App\UseCase\CreateOwner\Factory;

use App\Entity\User;
use App\UseCase\CreateOwner\Command\CreateOwner;

class OwnerCreator
{
    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }
    public function create(CreateOwner $userDto): User
    {
        $user = new User();
        $user
            ->setUuid($this->uuid)
            ->setName($userDto->getName())
            ->setEmail($userDto->getEmail());

        return $user;
    }
}
