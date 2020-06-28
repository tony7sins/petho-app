<?php

namespace App\Factory;

use App\Entity\Pet;

interface PetCreatorInterface
{
    public function create($petDTO): Pet;

    public function addOwner($owner): void;
}