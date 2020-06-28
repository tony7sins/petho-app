<?php

namespace App\Service\Calculator;

use InvalidArgumentException;

class PetSizeCalculator
{
    /**
     * Simple Universal Pet Size Calculator
     *
     * @param array $sizes
     * @param integer $height
     * @param integer $weight
     * @return string
     * @throws \InvalidArgumentException
     */
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
        return 'huge';
    }
}