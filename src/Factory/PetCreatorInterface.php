<?php

namespace App\Factory;

use App\Entity\Pet;
use App\Model\Pet\PetFormModelInterface;

interface PetCreatorInterface
{
    public function create(PetFormModelInterface $petModel): Pet;

    public function addOwner($owner): void;
}
