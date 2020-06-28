<?php

namespace App\Service\Converters;

interface PetSexConverterInterface
{
    /**
     * Converting Pet Sex from Entity string type property to boolean
     */
    public function convertToBool(string $dogSex): bool;

    /**
     * Converting Pet Sex from Pet DTO boolean type property to string
     */
    public function convertToString(bool $dogSex): string;
}