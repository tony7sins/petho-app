<?php

namespace App\Factory;

use App\Entity\Pet;
use App\Model\Pet\PetFormModelInterface;

abstract class PetCreator implements PetCreatorInterface
{
    /** @var Pet */
    private $entity;

    abstract public function create(PetFormModelInterface $petModel): Pet;

    public function addOwner($owner): void
    {
        return;
    }
}
