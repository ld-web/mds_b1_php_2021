<?php
require_once 'layout/header.php';
$login = 'Bob';
$password = 'pass';
$errorMessage = '';

// Si $_POST est non vide, donc si l'utilisateur a soumis le formulaire
if (!empty($_POST)) {
  // Si l'utilisateur a saisi un login ET un mot de passe
  if (!empty($_POST['login']) && !empty($_POST['password'])) {
    $dsn = "mysql:dbname=mds_b1_php;host=127.0.0.1;charset=utf8mb4";
    $pdo = new PDO($dsn, "mds_b1_php", "FUbaMxoyMJFuuWxp");

    $login = $_POST['login']; // email
    $password = $_POST['password'];

    // REQUÊTE NON PREPAREE = DANGEREUX
    // Je construis ma requête dans une chaîne de caractères
    // $query = "SELECT * FROM client WHERE email='$login' AND pass='$password'";
    // // Je demande à PDO d'exécuter cette requête
    // $stmt = $pdo->query($query);

    // REQUÊTE PREPAREE
    $query = 'SELECT * FROM client WHERE email=:username AND pass=:pass';
    $stmt = $pdo->prepare($query);
    $stmt->execute([
      'username' => $login,
      'pass' => $password
    ]);

    // fetch me renverra les résultats un par un
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Si fetch renvoie "false", alors je n'ai aucun utilisateur correspondant au login et au mot de passe entrés dans le formulaire
    if ($user === false) {
      $errorMessage = 'Invalid login or password';
    } else {
      $_SESSION['login'] = $login;
      header('Location: admin.php');
      exit;
    }

    // if ($_POST['login'] !== $login) {
    //   $errorMessage = 'Invalid login';
    // } elseif ($_POST['password'] !== $password) {
    //   $errorMessage = 'Invalid password';
    // } else {
    //   // On manipule notre session en partant du principe que notre header.php
    //   // s'occupe du session_start().
    //   // Ce n'est pas forcément toujours le cas, ainsi :
    //   // - Il peut être utile, avant de manipuler la session, de s'assurer qu'elle est bien démarrée
    //   // - Pour ce faire, vous pouvez utiliser la méthode session_status de la SPL :
    //   // https://www.php.net/manual/en/function.session-status
    //   $_SESSION['login'] = $login;
    //   header('Location: admin.php');
    //   exit;
    // }
  } else {
    $errorMessage = 'All fields are required';
  }
}
?>

<div style="color: red;">
  <?php echo $errorMessage; ?>
</div>

<form method="POST">
  <div>
    <label for="login">Login :</label>
    <input type="text" name="login" />
  </div>
  <div>
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" />
  </div>
  <div>
    <input type="submit" value="Connexion" />
  </div>
</form>

<?php
require_once 'layout/footer.php';
