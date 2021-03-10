<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mes clients</title>
</head>

<body>
  <h1>Mes clients</h1>

  <form>
    <input type="checkbox" name="registered" id="registered" <?php if (isset($_GET['registered'])) {
                                                                echo "checked";
                                                              } ?> />
    <label for="registered">Abonné à la newsletter</label>
    <input type="submit" value="Filtrer" />
  </form>

  <?php
  // Pour discuter avec mon serveur de bases de données,
  // je veux CONSTRUIRE un OBJET PDO
  // Pour le construire, je vais lui fournir :
  // - Un DSN (Data Source Name, ou bien Nom de Source de Données)
  // - Un nom d'utilisateur (tel que nous l'avons créé la dernière fois)
  // - Un mot de passe (tel que nous l'avons défini la dernière fois)
  // Je vais mettre cet objet dans une variable
  $dsn = "mysql:dbname=mds_b1_php;host=127.0.0.1;charset=utf8mb4";
  $pdo = new PDO($dsn, "mds_b1_php", "FUbaMxoyMJFuuWxp");

  // Sur l'objet pdo, je vais appeler une "fonction" query, qui me permettra d'effectuer une requête vers mon serveur de base de données
  // En paramètre de cette fonction, je vais donc lui passer la requête que je souhaite exécuter
  // La fonction query va me renvoyer un STATEMENT que je peux donc placer dans une variable
  // Ce statement contient donc le résultat de ma requête, que je vais pouvoir lire ensuite

  if (isset($_GET['registered'])) {
    $stmt = $pdo->query("SELECT * FROM client WHERE newsletter_registered = 1");
  } else {
    $stmt = $pdo->query("SELECT * FROM client");
  }
  if (!$stmt) { // ou bien si $stmt === false
    die('Erreur lors de la requête');
  }
  // Sur ce statement, je vais pouvoir aller récupérer mes résultats
  // Je lui passe l'option PDO::FETCH_ASSOC pour lui indiquer que je souhaite que mes résultats soient sous forme de tableau associatif
  // Dans les tableaux associatifs, les clés seront les noms des colonnes de ma table
  $clients = $stmt->fetchAll(PDO::FETCH_ASSOC);

  foreach ($clients as $client) {
    echo $client['firstname'] . ' ' . $client['name'] . "<br />";
  }
  ?>
</body>

</html>