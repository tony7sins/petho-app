<?php

namespace App\Service\Converter;

use App\Service\Converter\Exception\WrongAnimalSexException;

class DogSexConverter implements PetSexConverterInterface
{
    const FEMALE = 'female';
    const MALE = 'male';

    /** @throws DomainException */
    public function convertToBool(string $dogSex = 'male'): bool
    {
        switch ($dogSex) {
            case 'male':
                return true;
            case 'female':
                return false;
            default:
                $this->throwException();
        }
    }

    public function convertToString(bool $dogIsMale = true): string
    {
        return $dogIsMale ? self::MALE : self::FEMALE;
    }

    private function throwException()
    {
        throw new WrongAnimalSexException;
    }
}