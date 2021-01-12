<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Test PHP</title>
</head>

<body>
  <h1>
    <?php echo "Coucou"; ?>
  </h1>
  <?php
  /*
  Déclaration d'une variable : préfixer par '$'
  */
  $numero = 1;
  $uneVariableBooleenne = true; // booléen : soit true, soit false
  $uneVariableFlottante = 198.6;
  // Utilisation de guillemets doubles : possibilité d'injecter la variable
  echo "Numéro : $numero<br />";
  // Guillemets simples : la variable n'est pas interprétée
  echo 'Numéro : $numero<br />';
  // Opérateur de concaténation
  echo 'Numéro : ' . $numero . '<br />';

  const MA_CONSTANTE = 123;
  echo MA_CONSTANTE;
  ?>
</body>

</html>