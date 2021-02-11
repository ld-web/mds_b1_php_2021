<?php

function isFormSubmitted(): bool
{
  return !empty($_POST);
}

function requiredFieldsArePresent(): bool
{
  // Réécrivez ce code pour l'optimiser
  // Utilisation de isset pour vérifier la présence
  // Attention, empty renvoie 'true' si la valeur vaut 0
  // Et pour la donnée 'registered' par exemple, il se trouve qu'on peut recevoir la valeur 0
  return isset($_POST['nom']) &&
    isset($_POST['prenom']) &&
    isset($_POST['email']) &&
    isset($_POST['registered']) &&
    isset($_POST['subject']) &&
    isset($_POST['cgu']) &&
    isset($_POST['message']);
}

function dataIsValid(): bool
{
  // Réécrivez ce code pour l'optimiser
  $filteredEmail = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
  $registered = $_POST['registered'];
  $subject = $_POST['subject'];
  if (
    $filteredEmail !== false &&
    ($registered == 0 || $registered == 1) &&
    ($subject == 1 || $subject == 2 || $subject == 3)
  ) {
    return true;
  } else {
    return false;
  }
}
