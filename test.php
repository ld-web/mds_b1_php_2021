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
  $monPrenom = "Lucas";
  // Utilisation de guillemets doubles : possibilité d'injecter la variable
  echo "Numéro : $numero<br />";
  // Guillemets simples : la variable n'est pas interprétée
  echo 'Numéro : $numero<br />';
  // Opérateur de concaténation
  echo 'Numéro : ' . $numero . '<br />';

  // Déclaration de constante : sans le '$'
  const MA_CONSTANTE = 123;
  echo MA_CONSTANTE;

  // Déclaration d'un tableau contenant 5 valeurs entières
  $monTableau = [1, 2, 3, 4, 5];
  // Indices :        0, 1   , 2
  $monAutreTableau = [6, true, $monPrenom];
  var_dump($monAutreTableau);
  // Accès à une valeur par un index numérique
  echo $monAutreTableau[0];

  $utilisateur = [
    0 => "Coucou",
    'login' => 'Lucas',
    'email' => 'test@test.com',
    'account_activated' => false
  ];
  var_dump($utilisateur);
  // Accès à une valeur par une clé nommée
  echo $utilisateur['email'];
  var_dump($utilisateur[0]);
  ?>
  <p>
    <?php
    // Boucle for :
    // Instruction d'initialisation; condition de maintien; instruction de pas
    for ($i = 0; $i < 10; $i++) {
      echo $i . "<br />";
    }
    ?>
  </p>
</body>

</html>