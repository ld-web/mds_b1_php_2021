<?php
require_once 'layout/header.php';

// Solution 1 - on détruit le contenu de la session relatif à notre login
unset($_SESSION['login']);

// Solution 2 - Vider toute la session
$_SESSION = [];

header('Location: login.php');
exit;
