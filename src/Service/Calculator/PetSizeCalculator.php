<?php

namespace App\Service\Calculator;

class PetSizeCalculator implements PetSizeCalculatorInterface
{
    /** @inheritDoc */
    public function calculateSize(array $sizes, int $height, int $weight): string
    {
        if ($height <= 0 || $weight <= 0) {
            throw new \InvalidArgumentException("arguments should not be <= 0", 100);
        }

        foreach ($sizes as $size => $measures) {
            if (
                $height <= $measures['height'] &&
                $weight <= $measures['weight']) {

                return $size;
            }
        }

        return array_key_last($sizes);
    }
}