<?php

/*
Recherche d'un produit par son nom
- Je veux pouvoir spécifier le nom recherché dans l'URL
- PHP pourra donc réceptionner ce paramètre d'URL (paramètre GET),
  et le mapper dans le tableau superglobal $_GET
- Ainsi, ce script peut récupérer la valeur passée dans l'URL en allant
  chercher $_GET['nom']
*/

// J'importe ma source de données pour pouvoir rechercher dedans
require_once 'data/products.php';

// $_GET contient tous les paramètres GET de la requête
// Donc tous les paramètres se trouvant dans l'URL
// Je teste le cas représentant un échec
// Cet échec va me pouser à arrêter l'exécution de mon script
// Ainsi, je n'ai pas de "else" à inscrire
// Puisque si je ne rentre pas dans le "if" de la situation d'échec,
// cela signifie que je peux continuer le flot normal d'exécution de mon script
if (!isset($_GET['nom'])) {
  // J'arrête l'exécution du script
  die("Le nom est requis pour la recherche");
}

$nom = $_GET['nom'];

// Pour chque produit, vérifier si le nom passée en URL correspond
foreach ($products as $product) {
  // Si le nom passé dans l'URL est égal au nom du produit,
  // alors on affiche le produit
  if (strtolower($nom) === strtolower($product['name'])) {
    require_once 'product_item.php';
  }
}
