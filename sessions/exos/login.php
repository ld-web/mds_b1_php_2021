<?php
require_once 'layout/header.php';
$login = 'Bob';
$password = 'pass';
$errorMessage = '';

// Si $_POST est non vide, donc si l'utilisateur a soumis le formulaire
if (!empty($_POST)) {
  // Si l'utilisateur a saisi un login ET un mot de passe
  if (!empty($_POST['login']) && !empty($_POST['password'])) {
    if ($_POST['login'] !== $login) {
      $errorMessage = 'Invalid login';
    } elseif ($_POST['password'] !== $password) {
      $errorMessage = 'Invalid password';
    } else {
      // On manipule notre session en partant du principe que notre header.php
      // s'occupe du session_start().
      // Ce n'est pas forcément toujours le cas, ainsi :
      // - Il peut être utile, avant de manipuler la session, de s'assurer qu'elle est bien démarrée
      // - Pour ce faire, vous pouvez utiliser la méthode session_status de la SPL :
      // https://www.php.net/manual/en/function.session-status
      $_SESSION['login'] = $login;
      header('Location: admin.php');
      exit;
    }
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
