<?php
// Haut de fichier : déclaration de variables
$nom = "Delobelle";
$prenom = "Lucas";

$centresInteret = ["VTT", "Badminton", "Tennis", "Jeu vidéo", "Airsoft", "Modélisme", "Musique"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <link rel="preconnect" href="https://fonts.gstatic.com">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@400;700&display=swap" rel="stylesheet">
  <title>Exercice</title>
</head>

<body>
  <h1>
    Bonjour, je suis <?php echo $nom . " " . $prenom; ?>
  </h1>

  <h2>
    Centres d'intérêt
  </h2>
  <ul>
    <?php for ($i = 0; $i < count($centresInteret); $i++) { ?>
      <li>
        <?php echo $centresInteret[$i]; ?>
      </li>
    <?php } ?>
  </ul>
</body>

</html>