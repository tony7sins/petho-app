<?php

namespace App\Service\Converters;

class DogSexConverter implements PetSexConverterInterface
{
    const FEMALE = 'female';
    const MALE = 'male';

    /** @throws Exception */
    public function convertToBool(string $dogSex = 'male'): bool
    {
        switch ($dogSex) {
            case 'male':
                return true;
                break;
            case 'female':
                return false;
                break;
            default:
                $this->throwException();
                break;
        }
    }

    public function convertToString(bool $dogIsMale = true): string
    {
        return $dogIsMale ? self::MALE : self::FEMALE;
    }

    private function throwException()
    {
        throw new \Exception();
    }
}