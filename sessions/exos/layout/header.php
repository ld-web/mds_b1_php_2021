<?php
session_start();
// équivalent de ++ ou bien var = var + 1
if (isset($_SESSION['page_counter'])) {
  $_SESSION['page_counter'] += 1;
} else {
  $_SESSION['page_counter'] = 1;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sessions PHP</title>
</head>

<body>
  <nav>
    <ul>
      <li><a href="index.php">Accueil</a></li>
      <li>
        <?php if (isset($_SESSION['login'])) { ?>
          <a href="logout.php">
            Déconnexion (<?php echo $_SESSION['login']; ?>)
          </a>
        <?php } else { ?>
          <a href="login.php">Connexion</a>
        <?php } ?>
      </li>
    </ul>
  </nav>