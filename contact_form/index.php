<?php
require_once 'functions.php';

// Je vérifie si j'ai des données envoyées d'un formulaire
if (isFormSubmitted()) {
  // Analyse des données du formulaire
  if (requiredFieldsArePresent() && dataIsValid()) {
    header('Location: thankyou.php');
    die();
  } else {
    $error = true;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="styles.css" rel="stylesheet" />
  <title>Formulaire de contact</title>
</head>

<body>
  <div id="content">
    <h1>Contact</h1>

    <?php if (isset($error) && $error) { ?>
    <div class="error">
      Erreur :<br />
      Vérifiez que vous avez rempli tous les champs et qu'ils sont au format requis
    </div>
    <?php }?>

    <form method="post">
      <div class="form-group">
        <label for="nom">Nom :</label>
        <input
        type="text"
        name="nom"
        id="nom"
        value="<?php if (isset($_POST['nom'])) {
          echo $_POST['nom'];
        } ?>" />
      </div>
      <div class="form-group">
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" />
      </div>
      <div class="form-group">
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" />
      </div>
      <div class="form-group">
        <p>Je suis déjà inscrit au site :</p>
        <label for="registeredYes" class="inline test">Oui</label>
        <input type="radio" name="registered" id="registeredYes" value="1" />
        <label for="registeredNo" class="inline">Non</label>
        <input type="radio" name="registered" id="registeredNo" value="0" checked />
      </div>
      <div class="form-group">
        <label for="subject">Objet de votre demande :</label>
        <select name="subject" id="subject">
          <option>Objet de votre demande</option>
          <option value="1">Demande de stage</option>
          <option value="2">Demande de devis</option>
          <option value="3">Demande d'informations</option>
        </select>
      </div>
      <div class="form-group">
        <input type="checkbox" name="cgu" id="cgu" />
        <label for="cgu" class="inline">J'accepte les CGU</label>
      </div>
      <div class="form-group">
        <label for="message">Message :</label>
        <textarea name="message" id="message" cols="50" rows="10"></textarea>
      </div>
      <div class="form-group">
        <input type="submit" value="Envoyer" />
      </div>
    </form>
  </div>
</body>

</html>