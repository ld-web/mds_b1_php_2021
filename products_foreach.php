<?php

require_once 'data/products.php';

/*
foreach classique :
  Chaque produit du tableau $products va être successivement mis dans
  la variable $product
*/
foreach ($products as $product) {
  /*
  foreach avec clé/valeur dans des variables séparées :
    pour chaque élément du tableau, on met la clé dans $prop
    et la valeur dans $val
  */
  foreach ($product as $prop => $val) {
    // utilisation d'une fonction de la spl : is_array
    // https://www.php.net/manual/en/function.is-array
    if (!is_array($val)) {
      echo $prop . " - " . $val . "<br />";
    }
  }
}
