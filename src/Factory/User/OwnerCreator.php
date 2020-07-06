<?php

namespace App\Factory\User;

use App\Entity\User;
use App\Model\User\OwnerFormModel;

class OwnerCreator
{
    private $uuid;

    public function __construct(string $uuid)
    {
        $this->uuid = $uuid;
    }
    public function create(OwnerFormModel $userDto): User
    {
        $user = new User();
        $user
            ->setUuid($this->uuid)
            ->setName($userDto->name)
            ->setEmail($userDto->email);

        return $user;
    }
}
