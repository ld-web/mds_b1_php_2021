<?php
require_once 'functions.php';

// Analyse des données du formulaire
if (requiredFieldsArePresent() && dataIsValid()) {
  echo "Données valides";
} else {
  echo "Données invalides";
}
