<?php

/**
 * Returns full price from a given price without VAT
 *
 * @param float $price Price without VAT
 * @param float $rate VAT rate (0 < rate < 1)
 * @return float Price with VAT
 */
function getPriceTtc(float $price, float $rate = 0.2): float
{
  return $price * (1 + $rate);
}
