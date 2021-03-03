<?php
session_start();
var_dump($_SESSION);
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
  <link rel="stylesheet" href="style.css" />
</head>

<?php
// Thème à appliquer
$defaultTheme = "sombre";
if (!isset($_SESSION['theme'])) {
  $theme = $defaultTheme;
} else {
  $theme = $_SESSION['theme'];
}
?>

<body class="<?php echo $theme; ?>">
  <form action="theme_process.php" method="post">
    <label for="theme">Thème :</label>
    <select name="theme" id="theme">
      <option value="clair" <?php if ($theme === 'clair') {
                              echo 'selected';
                            } ?>>Clair</option>
      <option value="sombre" <?php if ($theme === 'sombre') {
                                echo 'selected';
                              } ?>>Sombre</option>
    </select>
    <input type="submit" value="Choisir" />
  </form>
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