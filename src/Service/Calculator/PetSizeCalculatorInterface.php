<?php

namespace App\Service\Calculator;

interface PetSizeCalculatorInterface
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
    public function calculateSize(array $sizes, int $height, int $weight): string;
}