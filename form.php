<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de newsletter</title>
</head>

<body>
  <form action="form_process.php" method="post">
    <label for="email">Email :</label>
    <!--
    - Mettre un attribut name à chaque champ du formulaire
    - type="email" et required sont des attributs de validation
    mais cette validation n'est effective que côté client.
    Pensez à ajouter une validation côté serveur.
    -->
    <input type="email" id="email" name="email" required />
    <button type="submit">Enregistrer</button>
  </form>
</body>

</html>