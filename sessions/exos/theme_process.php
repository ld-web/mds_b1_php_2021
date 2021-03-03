<?php
// Je m'assure d'avoir les données POST attendues
if (empty($_POST) || empty($_POST['theme'])) {
  header('Location: index.php');
  exit;
}

// Je démarre ou récupère ma session
session_start();
// J'assigne le thème sélectionné
// note : pour être plus rigoureux, je pourrais également contrôler la valeur qui se trouve derrière la clé 'theme', et que cette valeur est bien soit 'clair' soit 'sombre'
$_SESSION['theme'] = $_POST['theme'];

// Pour finir, on redirige vers la page d'accueil
header('Location: index.php');
exit;
