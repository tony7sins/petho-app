<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="dogs")
 */
class Dog extends Pet
{
    /** @var string */
    private $name;

    /** @var string */
    private $size;

    /** @var string */
    private $sex;

    /** @var string */
    private $birthMonth;

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getSize(): string
    {
        return $this->size;
    }

    public function setSize(string $size): self
    {
        $this->size = $size;

        return $this;
    }

    public function getSex(): string
    {
        return $this->sex;
    }

    public function setSex(string $sex): self
    {
        $this->sex = $sex;

        return $this;
    }

    public function getAge(): int
    {
        return $this->age;
    }

    public function setAge($age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getBirthMonth(): string
    {
        return $this->birthMonth;
    }

    public function setBirthMonth(string $birthMonth): self
    {
        $this->birthMonth = $birthMonth;

        return $this;
    }
}