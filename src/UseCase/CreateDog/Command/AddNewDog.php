<?php

namespace App\UseCase\CreateDog\Command;

class AddNewDog
{
    // private $animalFamily = 'dog';
    private $name = 'Dazy';
    private $height = 560;
    private $weight = 20000;
    private $age = 13;

    private $isActive = true;
    private $isFemale = true;
    private $isStelized = true;
    private $isCaptived = false;

    public function __construct(
        // string $animalFamily,
        bool $isActive,
        bool $isFemale,
        bool $isStelized,
        bool $isCaptived,
        int $height,
        int $weight,
        int $age,
        string $name) {

        // $this->animalFamily = $animalFamily;
        $this->isActive = $isActive;
        $this->isFemale = $isFemale;
        $this->isStelized = $isStelized;
        $this->isCaptived = $isCaptived;
        $this->height = $height;
        $this->weight = $weight;
        $this->age = $age;
        $this->name = $name;

    }

    // public function getAnimalFamily(): string
    // {
    //     return $this->animalFamily;
    // }

    public function getIsActive(): bool
    {
        return $this->isActive;
    }

    public function getIsFemale(): bool
    {
        return $this->isFemale;
    }

    public function getIsStelized(): bool
    {
        return $this->isStelized;
    }

    public function getIsCaptived(): bool
    {
        return $this->isCaptived;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getHeight(): int
    {
        return $this->height;
    }

    public function getWeight(): int
    {
        return $this->weight;
    }

    public function getAge(): int
    {
        return $this->age;
    }

}