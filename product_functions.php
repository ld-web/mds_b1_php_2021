<?php

/**
 * Returns full price from a given price with VAT
 *
 * @param float $price Price without VAT
 * @return float Price with VAT
 */
function getPriceTtc(float $price): float
{
  return $price * 1.2;
}
