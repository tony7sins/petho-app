<?php

namespace App\Factory;

use App\Entity\Pet;

abstract class PetCreator implements PetCreatorInterface
{
    /** @var Pet */
    private $entity;

    abstract public function create($DTOpet): Pet;

    public function addOwner($owner): void
    {
        return;
    }
}